<?php
function leerInventario($archivo) {
    $contenido = file_get_contents($archivo);
    return json_decode($contenido, true);
}


function ordenarInventario(&$inventario) {
    usort($inventario, function($a, $b) {
        return ($a['nombre'] <=> $b['nombre']); 
    });
}

function mostrarResumenInventario($inventario) {
    ordenarInventario($inventario);
    foreach ($inventario as $producto) {
        echo "Producto: {$producto['nombre']}, Precio: \${$producto['precio']}, Cantidad: {$producto['cantidad']}</br>";
    }
}

function calcularValorTotal($inventario) {
    return array_sum(array_map(function($producto) {
        return $producto['precio'] * $producto['cantidad'];
    }, $inventario));
}
 
function generarInformeStockBajo($inventario) {
    $stockBajo = array_filter($inventario, function($producto) {
        return $producto['cantidad'] < 5;
    });

    if (empty($stockBajo)) {
        echo "No hay productos con stock bajo.</br>";
    } else {
        foreach ($stockBajo as $producto) {
            echo "Productos con stock bajo: {$producto['nombre']}, Cantidad: {$producto['cantidad']}</br>";
        }
    }
}

$archivoInventario = 'inventario.json';
// leemos el json con el inventario
$inventario = leerInventario($archivoInventario);

echo "<h3>Resumen del Inventario:</h3>";
mostrarResumenInventario($inventario);

// mostramos los rpoductos con stock bajo o productos con stock menos a 10
echo "<h3>Informe de Stock Bajo:</h3>";
generarInformeStockBajo($inventario);

// obtenemos el precio total de los productos del inventario
$valorTotal = calcularValorTotal($inventario);
echo "</br><h3>Valor Total del Inventario: \$$valorTotal</h3></br>";

?>