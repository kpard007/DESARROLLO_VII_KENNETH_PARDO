
<?php
// Ejemplo básico de array_filter()
$numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$pares = array_filter($numeros, function($n) {
    return $n % 3 == 0;
});

// arreglo dee productos electronicos 
$productos = [
    ["nombre" => "Laptop", "precio" => 1200, "disponible" => true],
    ["nombre" => "Tablet", "precio" => 450, "disponible" => false],
    ["nombre" => "Smartphone", "precio" => 800, "disponible" => true],
    ["nombre" => "Monitor", "precio" => 300, "disponible" => true],
    ["nombre" => "Teclado", "precio" => 100, "disponible" => false],
];

// filtrar productos elecrtonicos disponibles
$productosDisponibles = array_filter($productos, function($producto) {
    return $producto['disponible'] == true;
});
echo "</br>Productos que estan disponibles:</br>";
foreach ($productosDisponibles as $producto) {
    echo "- {$producto['nombre']} ({$producto['precio']} disponible)</br>";
}

echo "</br>";
//filtrar productos con precio mayor a 500
$productosCaros = array_filter($productos, function($producto) {
    return $producto['precio'] > 500;
});
echo "</br>Productos que cuestan mas de 500:</br>";
foreach ($productosCaros as $producto) {
    echo "- {$producto['nombre']} {$producto['precio']}$</br>";
}

echo "</br>";


echo "Números originales: " . implode(", ", $numeros) . "</br>";
echo "Números pares: " . implode(", ", $pares) . "</br>";

// Ejemplo con una función nombrada
function esPrimo($n) {
    if ($n < 2) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

$primos = array_filter($numeros, 'esPrimo');
echo "Números primos: " . implode(", ", $primos) . "</br>";

// Ejercicio: Filtra un array de strings para obtener solo las palabras que comienzan con una vocal
$palabras = ["auto", "casa", "elefante", "iglú", "oso", "uva", "zapato", "oro", "iglesia", "escuela"];
$empiezaConVocal = array_filter($palabras, function($palabra) {
    return in_array(strtolower($palabra[0]), ['a', 'e', 'i', 'o', 'u']);
});

echo "</br>Palabras originales: " . implode(", ", $palabras) . "</br>";
echo "Palabras que empiezan con vocal: " . implode(", ", $empiezaConVocal) . "</br>";

// Bonus: Filtrar un array asociativo
$personas = [
    ["nombre" => "Ana", "edad" => 25],
    ["nombre" => "Carlos", "edad" => 30],
    ["nombre" => "Beatriz", "edad" => 20],
    ["nombre" => "David", "edad" => 35],
    ["nombre" => "Juan", "edad" => 46],
    ["nombre" => "Maria", "edad" => 55],
    ["nombre" => "Laura", "edad" => 53]
];

$mayoresDe25 = array_filter($personas, function($persona) {
    return $persona['edad'] >= 35;
});

echo "</br>Personas que tienen o son mayores de 35 años:</br>";
foreach ($mayoresDe25 as $persona) {
    echo "- {$persona['nombre']} ({$persona['edad']} años)</br>";
}

// Extra: Uso de array_filter() con ARRAY_FILTER_USE_BOTH
$frutas = ["manzana" => 3, "banana" => 5, "naranja" => 2];
$frutasConMasDe3 = array_filter($frutas, function($cantidad, $nombre) {
    return $cantidad > 3 && strlen($nombre) > 5;
}, ARRAY_FILTER_USE_BOTH);

echo "</br>Frutas con más de 3 unidades y nombre largo:</br>";
print_r($frutasConMasDe3);

/* Desafío: Crear una función de filtrado personalizada
function filtrarPor($array, $campo, $valor) {
    return array_filter($array, function($item) use ($campo, $valor) {
        return isset($item[$campo]) && $item[$campo] == $valor;
    });
}
*/
//Modificamos la funcion filtrar por para que muestre valores menor que mayor que 
function filtrarPor($array, $campo, $valor, $comparacion = '==') {
    return array_filter($array, function($item) use ($campo, $valor, $comparacion) {
        if (!isset($item[$campo])) return false;
        
        switch ($comparacion) {
            case '==':
                return $item[$campo] == $valor;
            case '>':
                return $item[$campo] > $valor;
            case '<':
                return $item[$campo] < $valor;
            default:
                return false;
        }
    });
}


$estudiantes = [
    ["nombre" => "Elena", "curso" => "PHP", "nota" => 85],
    ["nombre" => "Miguel", "curso" => "JavaScript", "nota" => 90],
    ["nombre" => "Sofía", "curso" => "PHP", "nota" => 78],
    ["nombre" => "Lucas", "curso" => "Python", "nota" => 92]
];
echo "</br>";
$estudiantesPHP = filtrarPor($estudiantes, "curso", "PHP");
echo "</br>Estudiantes de PHP:</br>";
foreach ($estudiantesPHP as $estudiante) {
    echo "- {$estudiante['nombre']} (Nota: {$estudiante['nota']})</br>";
}

//////////////////////////////////////////////////////////////////////////////
// Filtrar estudiantes con nota mayor a 80
$estudiantesNotaAlta = filtrarPor($estudiantes, "nota", 86, '>');
echo "</br>Estudiantes con nota mayor a 86:</br>";
foreach ($estudiantesNotaAlta as $estudiante) {
    echo "- {$estudiante['nombre']} (Nota: {$estudiante['nota']})</br>";
}

$estudiantesNotaAlta = filtrarPor($estudiantes, "nota", 86,'<');
echo "</br>Estudiantes con nota menor a 86:</br>";
foreach ($estudiantesNotaAlta as $estudiante) {
    echo "- {$estudiante['nombre']} (Nota: {$estudiante['nota']})</br>";
}

?>
      
