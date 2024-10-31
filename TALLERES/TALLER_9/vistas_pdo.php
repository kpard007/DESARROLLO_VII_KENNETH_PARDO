<?php
require_once "config_pdo.php";

function mostrarResumenCategorias($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM vista_resumen_categorias");

        echo "<h3>Resumen por Categorías:</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Categoría</th>
                <th>Total Productos</th>
                <th>Stock Total</th>
                <th>Precio Promedio</th>
                <th>Precio Mínimo</th>
                <th>Precio Máximo</th>
              </tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['categoria']}</td>";
            echo "<td>{$row['total_productos']}</td>";
            echo "<td>{$row['total_stock']}</td>";
            echo "<td>{$row['precio_promedio']}</td>";
            echo "<td>{$row['precio_minimo']}</td>";
            echo "<td>{$row['precio_maximo']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function mostrarProductosPopulares($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM vista_productos_populares LIMIT 5");

        echo "<h3>Top 5 Productos Más Vendidos:</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Total Vendido</th>
                <th>Ingresos Totales</th>
                <th>Compradores Únicos</th>
              </tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['producto']}</td>";
            echo "<td>{$row['categoria']}</td>";
            echo "<td>{$row['total_vendido']}</td>";
            echo "<td>{$row['ingresos_totales']}</td>";
            echo "<td>{$row['compradores_unicos']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


function mostrarProductosBajoStock($pdo) {
    $sql = "SELECT * FROM vista_productos_bajo_stock";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    echo "<h3>Productos con Bajo Stock:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Producto</th>
            <th>Categoría</th>
            <th>Stock Actual</th>
            <th>Total Vendido</th>
            <th>Ingresos Totales</th>
          </tr>";

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['producto']}</td>";
            echo "<td>{$row['categoria']}</td>";
            echo "<td>{$row['stock_actual']}</td>";
            echo "<td>{$row['total_vendido']}</td>";
            echo "<td>{$row['ingresos_totales']}</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No hay productos con bajo stock.</td></tr>";
    }

    echo "</table>";
}


function mostrarHistorialClientes($pdo) {
    $sql = "SELECT * FROM vista_historial_clientes";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    echo "<h3>Historial de Compras por Cliente:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>ID Cliente</th>
            <th>Nombre Cliente</th>
            <th>Fecha Compra</th>
            <th>Producto</th>
            <th>Cantidad Comprada</th>
            <th>Monto Total del Producto</th>
          </tr>";

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['cliente_id']}</td>";
            echo "<td>{$row['cliente_nombre']}</td>";
            echo "<td>{$row['fecha_compra']}</td>";
            echo "<td>{$row['producto']}</td>";
            echo "<td>{$row['cantidad_comprada']}</td>";
            echo "<td>{$row['monto_total_producto']}</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No hay historial de compras disponible.</td></tr>";
    }

    echo "</table>";
}

function mostrarMetricasRendimientoCategoria($pdo) {
    $sql = "SELECT * FROM vista_metricas_rendimiento_categoria";

    try{
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        echo "<h3>Métricas de Rendimiento por Categoría:</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Categoría</th>
                <th>Cantidad de Productos</th>
                <th>Ventas Totales</th>
                <th>Producto Más Vendido</th>
            </tr>";

    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['categoria_nombre']}</td>";
                echo "<td>{$row['cantidad_productos']}</td>";
                echo "<td>{$row['ventas_totales']}</td>";
                echo "<td>{$row['producto_mas_vendido']}</td>";
                echo "</tr>";
            }
            echo "</table>";

    } catch (PDOException $e) {
        echo "Error al ejecutar la consulta: " . $e->getMessage();
    }
} 



    function mostrarTendenciasVentas($pdo) {
        $sql = "SELECT * FROM vista_tendencias_ventas";
        
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
    
            echo "<h3>Tendencias de Ventas por Mes:</h3>";
            echo "<table border='1'>";
            echo "<tr>
                    <th>Mes</th>
                    <th>Total Ventas</th>
                    <th>Total Ventas Realizadas</th>
                    <th>Ventas Mes Anterior</th>
                    <th>Ventas Dos Meses Anteriores</th>
                  </tr>";
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['mes_venta']}</td>";
                echo "<td>{$row['total_ventas']}</td>";
                echo "<td>{$row['total_ventas_realizadas']}</td>";
                echo "<td>{$row['ventas_mes_anterior']}</td>";
                echo "<td>{$row['ventas_mes_dos_anterior']}</td>";
                echo "</tr>";
            }
            echo "</table>";
    
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();
        }
    }


// Mostrar los resultados
mostrarResumenCategorias($pdo);
mostrarProductosPopulares($pdo);
mostrarProductosBajoStock($pdo);
mostrarHistorialClientes($pdo);
mostrarMetricasRendimientoCategoria($pdo);
mostrarTendenciasVentas($pdo);

$pdo = null;
?>