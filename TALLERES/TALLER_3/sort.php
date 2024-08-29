
<?php
// Ejemplo básico de sort()
$numeros = [10, 9, 8, 7, 6,5,4,3,2,1];
echo "Array original: " . implode(", ", $numeros) . "</br>";
sort($numeros);
echo "Array ordenado: " . implode(", ", $numeros) . "</br>";

// Ordenar strings
$frutas = ["apple", "grapes", "orange", "avocado", "pinneaple"];
echo "</br>Frutas originales: " . implode(", ", $frutas) . "</br>";
sort($frutas);
echo "Frutas ordenadas: " . implode(", ", $frutas) . "</br>";

// Ejercicio: Ordenar calificaciones de estudiantes
$calificaciones = [
    "Juan" => 85,
    "María" => 92,
    "Carlos" => 78,
    "Ana" => 95
];
echo "</br>Calificaciones originales:</br>";
print_r($calificaciones);

asort($calificaciones);  // Ordena por valor manteniendo la asociación de índices
echo "Calificaciones ordenadas por nota:</br>";
print_r($calificaciones);

ksort($calificaciones);  // Ordena por clave (nombre del estudiante)
echo "Calificaciones ordenadas por nombre:</br>";
print_r($calificaciones);



// crear un arreglo y ordernarlo usando asor, arsort y ksort
$productos = [
    "Laptop" => 1000,
    "Teléfono" => 500,
    "Tablet" => 300,
    "Monitor" => 200,
    "Teclado" => 50
];
echo "</br></br>";
echo "</br>Array original:</br>";
print_r($productos);
echo "</br>";
// prr valor ascendente
asort($productos);
echo "</br>Ordenado por precio (asort):</br>";
print_r($productos);
echo "</br>";
// por clave ascendente
ksort($productos);
echo "</br>Ordenado por nombre de producto (ksort):</br>";
print_r($productos);
echo "</br>";
// por valor descendente
arsort($productos);
echo "</br>Ordenado por precio en orden descendente (arsort):</br>";
print_r($productos);
echo "</br>";


// Bonus: Ordenar en orden descendente
$numeros = [5, 2, 8, 1, 9];
rsort($numeros);
echo "</br>Números en orden descendente: " . implode(", ", $numeros) . "</br>";

// Extra: Ordenar array multidimensional
$estudiantes = [
    ["nombre" => "Juan", "edad" => 20, "promedio" => 8.5],
    ["nombre" => "María", "edad" => 22, "promedio" => 9.2],
    ["nombre" => "Carlos", "edad" => 19, "promedio" => 7.8],
    ["nombre" => "Ana", "edad" => 21, "promedio" => 9.5]
];

// Ordenar por promedio
usort($estudiantes, function($a, $b) {
    return $b['promedio'] <=> $a['promedio'];
});

echo "</br>Estudiantes ordenados por promedio (descendente):</br>";
foreach ($estudiantes as $estudiante) {
    echo "{$estudiante['nombre']}: {$estudiante['promedio']}</br>";
}

// Desafío: Implementar ordenamiento personalizado
function ordenarPorLongitud($a, $b) {
    return strlen($b) - strlen($a);
}
///////////////////////////////////////////////////////////////////////////

function ordenarPorLongitudAsc($a, $b) {
    return strlen($a) - strlen($b);
}

//ordenamos por longitud ascendente
$palabras = ["PHP", "JavaScript", "Python", "Java", "C++", "Ruby"];
usort($palabras, 'ordenarPorLongitudAsc');
echo "</br>Palabras ordenadas por longitud (ascendente):</br>";
print_r($palabras);

// Ejemplo adicional: Ordenar preservando claves
$datos = [
    "z" => "Último",
    "a" => "Primero",
    "m" => "Medio"
];

ksort($datos);  // Ordena por clave
echo "</br>Datos ordenados por clave:</br>";
print_r($datos);

arsort($datos);  // Ordena por valor en orden descendente
echo "Datos ordenados por valor (descendente):</br>";
print_r($datos);
//////////////////////////////////////////////////////////////////////////////////////////
echo "</br>";
// ejemplo con criterio de ordenamiento complejo
$estudiantes = [
    ["nombre" => "Andres", "edad" => 20, "promedio" => 8.5],
    ["nombre" => "etesech", "edad" => 22, "promedio" => 9.5],
    ["nombre" => "Michael", "edad" => 19, "promedio" => 7.8],
    ["nombre" => "Pedro", "edad" => 21, "promedio" => 9.2],
    ["nombre" => "elpepe", "edad" => 23, "promedio" => 9.5]
];

// ordernar por promedio descendente, y luego por edad ascendente si los promedios son iguales
usort($estudiantes, function($a, $b) {
    if ($a['promedio'] == $b['promedio']) {
        return $a['edad'] <=> $b['edad']; // si los promedios son iguales, ordenar por edad
    }
    return $b['promedio'] <=> $a['promedio']; // se ordena por promedio primero
});

echo "</br>Estudiantes ordenados por promedio (descendente) y edad (ascendente):</br>";
foreach ($estudiantes as $estudiante) {
    echo "{$estudiante['nombre']}: Promedio {$estudiante['promedio']}, Edad {$estudiante['edad']}</br>";
}

?>

