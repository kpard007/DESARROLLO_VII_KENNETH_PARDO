<?php
require_once "config_mysqli.php";

// Función para registrar una venta
function registrarVenta($conn, $cliente_id, $producto_id, $cantidad) {
    $query = "CALL sp_registrar_venta(?, ?, ?, @venta_id)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iii", $cliente_id, $producto_id, $cantidad);
    
    try {
        mysqli_stmt_execute($stmt);
        
        // Obtener el ID de la venta
        $result = mysqli_query($conn, "SELECT @venta_id as venta_id");
        $row = mysqli_fetch_assoc($result);
        
        echo "Venta registrada con éxito. ID de venta: " . $row['venta_id'];

    } catch (Exception $e) {
        echo "Error al registrar la venta: " . $e->getMessage();
    }
    
    mysqli_stmt_close($stmt);
}

// Función para obtener estadísticas de cliente
function obtenerEstadisticasCliente($conn, $cliente_id) {
    $query = "CALL sp_estadisticas_cliente(?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $cliente_id);
    
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        $estadisticas = mysqli_fetch_assoc($result);
        
        echo "<h3>Estadísticas del Cliente</h3>";
        echo "Nombre: " . $estadisticas['nombre'] . "<br>";
        echo "Membresía: " . $estadisticas['nivel_membresia'] . "<br>";
        echo "Total compras: " . $estadisticas['total_compras'] . "<br>";
        echo "Total gastado: $" . $estadisticas['total_gastado'] . "<br>";
        echo "Promedio de compra: $" . $estadisticas['promedio_compra'] . "<br>";
        echo "Últimos productos: " . $estadisticas['ultimos_productos'] . "<br>";
      
    }
    
    mysqli_stmt_close($stmt);
}

function procesarDevolucion($conn, $venta_id, $producto_id, $cantidad) {
    $query = "CALL sp_procesar_devolucion(?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iii", $venta_id, $producto_id, $cantidad);
    
    try {
        mysqli_stmt_execute($stmt);
        echo "<br>Devolución procesada con éxito.";
    } catch (Exception $e) {
        echo "Error al procesar la devolución: " . $e->getMessage();
    }
    
    mysqli_stmt_close($stmt);
}


// Función para aplicar descuento
function aplicarDescuento($conn, $cliente_id) {
    $query = "CALL sp_aplicar_descuento(?, @descuento)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $cliente_id);

    try {
        mysqli_stmt_execute($stmt);

        // Obtener el descuento aplicado
        $result = mysqli_query($conn, "SELECT @descuento as descuento");
        $row = mysqli_fetch_assoc($result);
        
        echo "<br>Descuento aplicado: $" . $row['descuento'];
       
    } catch (Exception $e) {
        echo "Error al aplicar el descuento: " . $e->getMessage();
    }

    mysqli_stmt_close($stmt);
}

// Función para generar el reporte de bajo stock
function generarReporteBajoStock($conn) {
    $query = "CALL sp_reporte_bajo_stock()";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        echo "<h3>Reporte de Productos con Bajo Stock</h3>";
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad en Stock</th>
                    <th>Cantidad Sugerida para Reposición</th>
                </tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['stock']}</td>
                    <td>{$row['cantidad_sugerida']}</td>
                  </tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    
    } else {
        echo "<br>Error al generar el reporte: " . mysqli_error($conn);
    }
    
}



// Función para calcular la comisión
function calcularComision($conn, $venta_id) {

    while (mysqli_next_result($conn)); // leiberamos los resultados de cualquier consulta anterior

    $query = "CALL sp_calcular_comision(?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $venta_id);
    
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        $comision_info = mysqli_fetch_assoc($result);
        
        if ($comision_info) {
            echo "<h3>Comisión por Venta ID: {$comision_info['venta_id']}</h3>";
            echo "Total de la Venta: $" . number_format($comision_info['total_venta'], 2) . "<br>";
            echo "Cantidad de Productos Vendidos: " . $comision_info['cantidad_productos'] . "<br>";
            echo "Comisión Calculada: $" . number_format($comision_info['comision'], 2) . "<br>";
        } else {
            echo "No se encontraron datos para la venta ID: $venta_id.";
        }

    } else {
        echo "Error al calcular la comisión: " . mysqli_stmt_error($stmt);
    }
    
    mysqli_stmt_close($stmt);
}



// Ejemplos de uso
registrarVenta($conn, 1, 1, 2);
obtenerEstadisticasCliente($conn, 1);
procesarDevolucion($conn, 8, 1, 2); 
aplicarDescuento($conn, 1); //id 1
generarReporteBajoStock($conn);
calcularComision($conn, 1);

mysqli_close($conn);
?>