
<?php
// Ejemplo básico de array_map()
$numeros = [1, 2, 3, 4, 5];
$cuadrados = array_map(function($n) {
    return $n * $n;
}, $numeros);

echo "Números originales: " . implode(", ", $numeros) . "</br>";
echo "Cuadrados: " . implode(", ", $cuadrados) . "</br>";

// Ejemplo con una función nombrada
function duplicar($n) {
    return $n * 2;
}

$duplicados = array_map('duplicar', $numeros);
echo "Números duplicados: " . implode(", ", $duplicados) . "</br>";

// arrelgo con precios de productos
$precios = [100, 200, 300, 400, 500];

// funcion para obtener el 7%
function calcularSiete($precio) {
    $siete = 0.07; 
    return $precio + ($precio * $siete);
}

// productos mas el siete
$preciosConElSiete = array_map('calcularSiete', $precios);
echo "</br>";
echo "Precios originales: " . implode(", ", $precios) . "</br>";
echo "Precios con 7%: " . implode(", ", $preciosConElSiete) . "</br>";



// Ejercicio: Convierte un array de strings a mayúsculas
$frutas = ["manzana", "banana", "cereza", "dátil"];
$frutasMayusculas = array_map('strtoupper', $frutas);

echo "</br>Frutas originales: " . implode(", ", $frutas) . "</br>";
echo "Frutas en mayúsculas: " . implode(", ", $frutasMayusculas) . "</br>";

// Bonus: Usar array_map() con múltiples arrays
$nombres = ["Ana", "Carlos", "Beatriz","Mario", "Juan", "Pedro"];
$apellidos = ["García", "Rodríguez", "López", "Dominguez", "Toledo", "Rivera"];
$nombresCompletos = array_map(function($nombre, $apellido) {
    return $nombre . " " . $apellido;
}, $nombres, $apellidos);

echo "</br>Nombres completos:</br>";
foreach ($nombresCompletos as $nombreCompleto) {
    echo "- $nombreCompleto</br>";
}

// Extra: Transformar un array asociativo
$productos = [
    ["nombre" => "Laptop", "precio" => 800],
    ["nombre" => "Teléfono", "precio" => 500],
    ["nombre" => "Tablet", "precio" => 300],
    ["nombre" => "Audifonos", "precio" => 250],
    ["nombre" => "Samsung ring", "precio" => 550]
];

$productosConDescuento = array_map(function($producto) {
    $producto['precio_descuento'] = $producto['precio'] * 0.7; // 70% de descuento
    return $producto;
}, $productos);

echo "</br>Productos con descuento:</br>";
foreach ($productosConDescuento as $producto) {
    echo "- {$producto['nombre']}: Precio original: $" . $producto['precio'] . ", ";
    echo "Precio con descuento: $" . $producto['precio_descuento'] . "</br>";
}

// Desafío: Crear una función que aplique diferentes operaciones a cada elemento
function aplicarOperaciones($array, $operaciones) {
    return array_map(function($valor, $operacion) {
        return $operacion($valor);
    }, $array, $operaciones);
}

$valores = [1, 2, 3, 4, 5];
$operaciones = [
    function($n) { return $n * 2; },
    function($n) { return $n * $n; },
    function($n) { return $n + 10; },
    function($n) { return $n / 2; },
    function($n) { return $n % 3; }
];

$resultados = aplicarOperaciones($valores, $operaciones);

echo "</br>Resultados de operaciones personalizadas:</br>";
foreach ($valores as $index => $valor) {
    echo "Valor original: $valor, Resultado: {$resultados[$index]}</br>";
}
?>
      
