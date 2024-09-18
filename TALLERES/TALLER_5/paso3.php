
<?php
// 1. Crear un arreglo de estudiantes con sus calificaciones
$estudiantes = [
    ["nombre" => "Ana", "calificaciones" => [85, 92, 78, 96, 88]],
    ["nombre" => "Juan", "calificaciones" => [75, 84, 91, 79, 86]],
    ["nombre" => "María", "calificaciones" => [92, 95, 89, 97, 93]],
    ["nombre" => "Pedro", "calificaciones" => [70, 72, 78, 75, 77]],
    ["nombre" => "Laura", "calificaciones" => [88, 86, 90, 85, 89]]
];

// 2. Función para calcular el promedio de calificaciones
function calcularPromedio($calificaciones) {
    return array_sum($calificaciones) / count($calificaciones);
}

// 3. Función para asignar una letra de calificación basada en el promedio
function asignarLetraCalificacion($promedio) {
    if ($promedio >= 90) return 'A';
    if ($promedio >= 80) return 'B';
    if ($promedio >= 70) return 'C';
    if ($promedio >= 60) return 'D';
    return 'F';
}

// 4. Procesar y mostrar información de estudiantes
echo "Información de estudiantes:";
foreach ($estudiantes as &$estudiante) {
    $promedio = calcularPromedio($estudiante["calificaciones"]);
    $estudiante["promedio"] = $promedio;
    $estudiante["letra_calificacion"] = asignarLetraCalificacion($promedio);
    
    echo "<br><br>{$estudiante['nombre']}:";
    echo "<br>Calificaciones: " . implode(", ", $estudiante["calificaciones"]);
    echo "<br> Promedio: " . number_format($promedio, 2);
    echo "<br>Calificación: {$estudiante['letra_calificacion']}";
}

// 5. Encontrar al estudiante con el promedio más alto
$mejorEstudiante = array_reduce($estudiantes, function($mejor, $actual) {
    return (!$mejor || $actual["promedio"] > $mejor["promedio"]) ? $actual : $mejor;
});

echo "<br><br>Estudiante con el promedio más alto: {$mejorEstudiante['nombre']} ({$mejorEstudiante['promedio']})\n";

// 6. Calcular y mostrar el promedio general de la clase
$promedioGeneral = array_sum(array_column($estudiantes, "promedio")) / count($estudiantes);
echo "<br>Promedio general de la clase: " . number_format($promedioGeneral, 2) . "\n";

// 7. Contar estudiantes por letra de calificación
$conteoCalificaciones = array_count_values(array_column($estudiantes, "letra_calificacion"));
echo "<br><br>Distribución de calificaciones:<br>";
foreach ($conteoCalificaciones as $letra => $cantidad) {
    echo "$letra: $cantidad estudiante(s)";
}

// TAREA: Implementa una función que identifique a los estudiantes que necesitan tutoría
// (aquellos con un promedio menor a 75) y otra que liste a los estudiantes de honor
// (aquellos con un promedio de 90 o más).
// Tu código aquí

//estudiantes con promedio menor a 75
function estudiantesNecesitanTutoria($estudiantes) {
    return array_filter($estudiantes, function($estudiante) {
        return $estudiante["promedio"] < 75;
    });
}

//estudiantes con promedion mayor o igual a 90 
function estudiantesDeHonor($estudiantes) {
    return array_filter($estudiantes, function($estudiante) {
        return $estudiante["promedio"] >= 90;
    });
}

//almacenamos en la variable los estudiantes que tengan un promedion < 75
$estudiantesConTutoría = estudiantesNecesitanTutoria($estudiantes);
if (count($estudiantesConTutoría) > 0) {
    echo "<br><br>Estudiantes que necesitan tutoría:<br>";
    foreach ($estudiantesConTutoría as $estudiante) {
        echo "{$estudiante['nombre']} - Promedio: " . number_format($estudiante['promedio'], 2) . "<br>";
    }
} else {
    echo "<br><br>No hay estudiantes que necesiten tutoría.<br>";
}
//almacenamos en la variables los estudiantes que tengan promedion >= a90 
$estudiantesDeHonor = estudiantesDeHonor($estudiantes);
if (count($estudiantesDeHonor) > 0) {
    echo "<br><br>Estudiantes de honor:<br>";
    foreach ($estudiantesDeHonor as $estudiante) {
        echo "{$estudiante['nombre']} - Promedio: " . number_format($estudiante['promedio'], 2) . "<br>";
    }
} else {
    echo "<br><br>No hay estudiantes de honor.<br>";
}

?>
        