<?php
// 1. Crear un arreglo asociativo de productos con su inventario
$inventario = [
    "laptop" => ["cantidad" => 50, "precio" => 800],
    "smartphone" => ["cantidad" => 100, "precio" => 500],
    "tablet" => ["cantidad" => 30, "precio" => 300],
    "smartwatch" => ["cantidad" => 25, "precio" => 150]
];

// 2. Función para mostrar el inventario
function mostrarInventario($inv) {
    foreach ($inv as $producto => $info) {
        echo "$producto: {$info['cantidad']} unidades, Precio: {$info['precio']}<br><br>";
    }
}

// 3. Mostrar inventario inicial
echo "Inventario inicial:<br>";
mostrarInventario($inventario);

// 4. Función para actualizar el inventario
function actualizarInventario(&$inv, $producto, $cantidad, $precio = null) {
    if (!isset($inv[$producto])) {
        $inv[$producto] = ["cantidad" => $cantidad, "precio" => $precio];
    } else {
        $inv[$producto]["cantidad"] += $cantidad;
        if ($precio !== null) {
            $inv[$producto]["precio"] = $precio;
        }
    }
}

// 5. Actualizar inventario
actualizarInventario($inventario, "laptop", -5);  // Venta de 5 laptops
actualizarInventario($inventario, "smartphone", 50, 450);  // Nuevo lote de smartphones con precio actualizado
actualizarInventario($inventario, "auriculares", 100, 50);  // Nuevo producto

// 6. Mostrar inventario actualizado
echo "\nInventario actualizado:\n";
mostrarInventario($inventario);

// 7. Función para calcular el valor total del inventario
function valorTotalInventario($inv) {
    $total = 0;
    foreach ($inv as $producto => $info) {
        $total += $info['cantidad'] * $info['precio'];
    }
    return $total;
}

// 8. Mostrar valor total del inventario
echo "\nValor total del inventario: $" . valorTotalInventario($inventario) . "\n";

// TAREA: Crea una función que encuentre y retorne el producto con el mayor valor total en inventario
// (cantidad * precio). Muestra el resultado.
// Tu código aquí


function encontrarMayorValorTotal($inventario) {
    $productoMayor = 0;
    $mayorValorTotal = 0;

    foreach ($inventario as $precioYcantidad => $valorMayor) {
        // (cantidad * precio)
        $valorTotal = $valorMayor['cantidad'] * $valorMayor['precio'];


        // checamos cual es el valor mayor lo almacenamos en $Producto mayor
        if ($valorTotal > $mayorValorTotal) {
            $mayorValorTotal = $valorTotal;
            $productoMayor = $precioYcantidad;
        }
    }
    return ["producto" => $productoMayor, "valorTotal" => $mayorValorTotal];
}

// mostramos el resultaod 
$productoMayor = encontrarMayorValorTotal($inventario);
echo "<br><br>";
echo "El producto con el mayor valor total en inventario es: {$productoMayor['producto']} con un valor de {$productoMayor['valorTotal']}.";

?>
        