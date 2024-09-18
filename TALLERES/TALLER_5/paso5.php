<?php
// 1. Crear un string JSON con datos de una tienda en línea
$jsonDatos = '
{
    "tienda": "ElectroTech",
    "productos": [
        {"id": 1, "nombre": "Laptop Gamer", "precio": 1200, "categorias": ["electrónica", "computadoras"]},
        {"id": 2, "nombre": "Smartphone 5G", "precio": 800, "categorias": ["electrónica", "celulares"]},
        {"id": 3, "nombre": "Auriculares Bluetooth", "precio": 150, "categorias": ["electrónica", "accesorios"]},
        {"id": 4, "nombre": "Smart TV 4K", "precio": 700, "categorias": ["electrónica", "televisores"]},
        {"id": 5, "nombre": "Tablet", "precio": 300, "categorias": ["electrónica", "computadoras"]}
    ],
    "clientes": [
        {"id": 101, "nombre": "Ana López", "email": "ana@example.com"},
        {"id": 102, "nombre": "Carlos Gómez", "email": "carlos@example.com"},
        {"id": 103, "nombre": "María Rodríguez", "email": "maria@example.com"}
    ]
}
';

// 2. Convertir el JSON a un arreglo asociativo de PHP
$tiendaData = json_decode($jsonDatos, true);

// 3. Función para imprimir los productos
function imprimirProductos($productos) {
    foreach ($productos as $producto) {
        echo "{$producto['nombre']} - {$producto['precio']} - Categorías: " . implode(", ", $producto['categorias']) . "<br>";
    }
}

echo "Productos de {$tiendaData['tienda']}:<br>";
imprimirProductos($tiendaData['productos']);

// 4. Calcular el valor total del inventario
$valorTotal = array_reduce($tiendaData['productos'], function($total, $producto) {
    return $total + $producto['precio'];
}, 0);

echo "<br>Valor total del inventario: $$valorTotal<br>";

// 5. Encontrar el producto más caro
$productoMasCaro = array_reduce($tiendaData['productos'], function($max, $producto) {
    return ($producto['precio'] > $max['precio']) ? $producto : $max;
}, $tiendaData['productos'][0]);

echo "<br>Producto más caro: {$productoMasCaro['nombre']} - {$productoMasCaro['precio']}<br>";

// 6. Filtrar productos por categoría
function filtrarPorCategoria($productos, $categoria) {
    return array_filter($productos, function($producto) use ($categoria) {
        return in_array($categoria, $producto['categorias']);
    });
}

$productosDeComputadoras = filtrarPorCategoria($tiendaData['productos'], "computadoras");
echo "<br>Productos en la categoría 'computadoras':<br>";
imprimirProductos($productosDeComputadoras);

// 7. Agregar un nuevo producto
$nuevoProducto = [
    "id" => 6,
    "nombre" => "Smartwatch",
    "precio" => 250,
    "categorias" => ["electrónica", "accesorios", "wearables"]
];
$tiendaData['productos'][] = $nuevoProducto;

// 8. Convertir el arreglo actualizado de vuelta a JSON
$jsonActualizado = json_encode($tiendaData, JSON_PRETTY_PRINT);
echo "<br>Datos actualizados de la tienda (JSON):<br>$jsonActualizado<br>";

// TAREA: Implementa una función que genere un resumen de ventas
// Crea un arreglo de ventas (producto_id, cliente_id, cantidad, fecha)
$ventas = [
    ["producto_id" => 1, "cliente_id" => 101, "cantidad" => 2, "fecha" => "2024-09-01"],
    ["producto_id" => 2, "cliente_id" => 102, "cantidad" => 1, "fecha" => "2024-09-03"],
    ["producto_id" => 3, "cliente_id" => 103, "cantidad" => 5, "fecha" => "2024-09-05"],
    ["producto_id" => 1, "cliente_id" => 103, "cantidad" => 1, "fecha" => "2024-09-06"],
    ["producto_id" => 4, "cliente_id" => 101, "cantidad" => 1, "fecha" => "2024-09-07"]
];
// y genera un informe que muestre:
// - Total de ventas
// - Producto más vendido
// - Cliente que más ha comprado
// Tu código aquí

function generarResumenVentas($ventas, $productos, $clientes) {
    $totalVentas = 0;
    $productosVendidos = [];
    $clientesCompras = [];

    foreach ($ventas as $venta) {
        $totalVentas += $venta['cantidad'];

        //contar ventas por producto
        if (!isset($productosVendidos[$venta['producto_id']])) {
            $productosVendidos[$venta['producto_id']] = 0;
        }
        $productosVendidos[$venta['producto_id']] += $venta['cantidad'];

        // contar compras por cliente
        if (!isset($clientesCompras[$venta['cliente_id']])) {
            $clientesCompras[$venta['cliente_id']] = 0;
        }
        $clientesCompras[$venta['cliente_id']] += $venta['cantidad'];
    }
    // producto más vendido
    $productoMasVendidoId = array_keys($productosVendidos, max($productosVendidos))[0];
    $productoMasVendido = array_filter($productos, function($producto) use ($productoMasVendidoId) {
        return $producto['id'] == $productoMasVendidoId;
    });
    $productoMasVendido = array_values($productoMasVendido)[0]; 

    //cliente que más ha comprado
    $clienteQueMasComproId = array_keys($clientesCompras, max($clientesCompras))[0];
    $clienteQueMasCompro = array_filter($clientes, function($cliente) use ($clienteQueMasComproId) {
        return $cliente['id'] == $clienteQueMasComproId;
    });
    $clienteQueMasCompro = array_values($clienteQueMasCompro)[0]; 

    // informe
    return [
        "total_ventas" => $totalVentas,
        "producto_mas_vendido" => $productoMasVendido['nombre'],
        "cliente_que_mas_compro" => $clienteQueMasCompro['nombre']
    ];
}

// resumen de ventas
    $resumenVentas = generarResumenVentas($ventas, $tiendaData['productos'], $tiendaData['clientes']);

    echo "<br>Resumen de Ventas:<br>";
    echo "Total de ventas: {$resumenVentas['total_ventas']}<br>";
    echo "Producto más vendido: {$resumenVentas['producto_mas_vendido']}<br>";
    echo "Cliente que más ha comprado: {$resumenVentas['cliente_que_mas_compro']}<br>";
?>
      