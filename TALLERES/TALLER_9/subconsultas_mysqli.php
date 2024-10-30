<?php
require_once "config_mysqli.php";

// 1. Productos que tienen un precio mayor al promedio de su categoría
$sql = "SELECT p.nombre, p.precio, c.nombre as categoria,
        (SELECT AVG(precio) FROM productos WHERE categoria_id = p.categoria_id) as promedio_categoria
        FROM productos p
        JOIN categorias c ON p.categoria_id = c.id
        WHERE p.precio > (
            SELECT AVG(precio)
            FROM productos p2
            WHERE p2.categoria_id = p.categoria_id
        )";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<h3>Productos con precio mayor al promedio de su categoría:</h3>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Producto: {$row['nombre']}, Precio: {$row['precio']}, ";
        echo "Categoría: {$row['categoria']}, Promedio categoría: {$row['promedio_categoria']}<br>";
    }
    mysqli_free_result($result);
}

// 2. Clientes con compras superiores al promedio
$sql = "SELECT c.nombre, c.email,
        (SELECT SUM(total) FROM ventas WHERE cliente_id = c.id) as total_compras,
        (SELECT AVG(total) FROM ventas) as promedio_ventas
        FROM clientes c
        WHERE (
            SELECT SUM(total)
            FROM ventas
            WHERE cliente_id = c.id
        ) > (
            SELECT AVG(total)
            FROM ventas
        )";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<h3>Clientes con compras superiores al promedio:</h3>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Cliente: {$row['nombre']}, Total compras: {$row['total_compras']}, ";
        echo "Promedio general: {$row['promedio_ventas']}<br>";
    }
    mysqli_free_result($result);
}
//Encontrar los productos que nunca se han vendido
$sql = "SELECT p.id, p.nombre, p.descripcion, p.precio, p.stock 
        FROM productos AS p
        WHERE NOT EXISTS (
            SELECT 1 
            FROM detalles_venta AS dv 
            WHERE dv.producto_id = p.id
        )";

$result = mysqli_query($conn, $sql);

if ($result) {
        echo "<h3>Productos nunca vendidos:</h3>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Producto: {$row['nombre']}, ";
            echo "Descripción: {$row['descripcion']}, ";
            echo "Precio: {$row['precio']}, ";
            echo "Stock: {$row['stock']}<br>";
        }
        mysqli_free_result($result);
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }

//Listar las categorías con el número de productos y el valor total del inventario.
$sql = "SELECT c.nombre AS categoria,
        COUNT(p.id) AS numero_productos,
        IFNULL(SUM(p.precio * p.stock), 0) AS valor_total_inventario 
    FROM 
        categorias AS c
    LEFT JOIN 
        productos AS p ON c.id = p.categoria_id
    GROUP BY 
        c.id
    ";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<h3>Categorías con número de productos y valor total de inventario:</h3>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Categoría: {$row['categoria']}, ";
        echo "Número de productos: {$row['numero_productos']}, ";
        echo "Valor total del inventario: {$row['valor_total_inventario']}<br>";
    }
    mysqli_free_result($result);

    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }



    //Encontrar los clientes que han comprado todos los productos de una categoría específica

    $categoria_id = 3; // asignamos un id para usarlo de ejemplo, pero podemos cambiarlo por cualquier otro

    $sql = "SELECT 
            cl.nombre AS cliente
        FROM 
            clientes AS cl
        JOIN 
            ventas AS v ON cl.id = v.cliente_id
        JOIN 
            detalles_venta AS dv ON v.id = dv.venta_id
        JOIN 
            productos AS p ON dv.producto_id = p.id
        WHERE 
            p.categoria_id = ?
        GROUP BY 
            cl.id
        HAVING 
            COUNT(DISTINCT p.id) = (
                SELECT COUNT(*) 
                FROM productos 
                WHERE categoria_id = ?
            )";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $categoria_id, $categoria_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result) {
        echo "<h3>Clientes que han comprado todos los productos de la categoría $categoria_id:</h3>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Cliente: {$row['cliente']}<br>";
        }
        mysqli_free_result($result);
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
    


    //Calcular el porcentaje de ventas de cada producto respecto al total de ventas.

    $sql = "SELECT 
    p.nombre AS producto,
    SUM(dv.subtotal) AS total_ventas_producto,
    (SUM(dv.subtotal) / (SELECT SUM(subtotal) FROM detalles_venta) * 100) AS porcentaje_ventas
    FROM 
        productos AS p
    JOIN 
        detalles_venta AS dv ON p.id = dv.producto_id
    GROUP BY 
        p.id
    ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<h3>Porcentaje de ventas de cada producto respecto al total:</h3>";
        while ($row = mysqli_fetch_assoc($result)) {
        echo "Producto: {$row['producto']}, ";
        echo "Total de ventas: {$row['total_ventas_producto']}, ";
        echo "Porcentaje de ventas: " . number_format($row['porcentaje_ventas'], 2) . "%<br>";
    }
    mysqli_free_result($result);
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }

mysqli_close($conn);
?>
        