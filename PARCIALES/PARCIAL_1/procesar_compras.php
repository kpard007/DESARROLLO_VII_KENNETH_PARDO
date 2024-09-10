<?php
include 'funciones_tienda.php';

$productos = [
    'camisa' => 50,
    'pantalon' => 70,
    'zapatos' => 80,
    'calcetines' => 10,
    'gorra' => 25
];


$carrito = [
    'camisa' => 10,
    'pantalon' => 5,
    'zapatos' => 7,
    'calcetines' => 6,
    'gorra' => 1
];


$subtotal = 0;
foreach ($carrito as $producto => $cantidad) {
    if ($cantidad > 0) {
        $subtotal += $productos[$producto] * $cantidad;
    }
}


$descuento = calcular_descuento($subtotal);
$impuesto = aplicar_impuesto($subtotal);
$total = calcular_total($subtotal, $descuento, $impuesto);


echo "<h2>Resumen de la Compra</h2>";
echo "<table border='1'>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
        </tr>";

foreach ($carrito as $producto => $cantidad) {
    if ($cantidad > 0) {
        $total_producto = $productos[$producto] * $cantidad;
        echo "<tr>
                <td>$producto</td>
                <td>$cantidad</td>
                <td>\${$productos[$producto]}</td>
                <td>\$$total_producto</td>
              </tr>";
    }
}

echo "</table>";
echo "<p><strong>Subtotal:</strong> \$$subtotal</p>";
echo "<p><strong>Descuento:</strong> \$$descuento</p>";
echo "<p><strong>Impuesto:</strong> \$$impuesto</p>";
echo "<p><strong>Total a Pagar:</strong> \$$total</p>";
?>
