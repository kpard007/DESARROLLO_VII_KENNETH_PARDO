<?php
require_once "config_pdo.php";

// Función para registrar una venta
function registrarVenta($pdo, $cliente_id, $producto_id, $cantidad) {
    try {
        $stmt = $pdo->prepare("CALL sp_registrar_venta(:cliente_id, :producto_id, :cantidad, @venta_id)");
        $stmt->bindParam(':cliente_id', $cliente_id, PDO::PARAM_INT);
        $stmt->bindParam(':producto_id', $producto_id, PDO::PARAM_INT);
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->execute();
        
        // Obtener el ID de la venta
        $result = $pdo->query("SELECT @venta_id as venta_id")->fetch(PDO::FETCH_ASSOC);
        
        echo "Venta registrada con éxito. ID de venta: " . $result['venta_id'];
    } catch (PDOException $e) {
        echo "Error al registrar la venta: " . $e->getMessage();
    }
}

// Función para obtener estadísticas de cliente
function obtenerEstadisticasCliente($pdo, $cliente_id) {
    try {
        $stmt = $pdo->prepare("CALL sp_estadisticas_cliente(:cliente_id)");
        $stmt->bindParam(':cliente_id', $cliente_id, PDO::PARAM_INT);
        $stmt->execute();
        
        $estadisticas = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo "<h3>Estadísticas del Cliente</h3>";
        echo "Nombre: " . $estadisticas['nombre'] . "<br>";
        echo "Membresía: " . $estadisticas['nivel_membresia'] . "<br>";
        echo "Total compras: " . $estadisticas['total_compras'] . "<br>";
        echo "Total gastado: $" . $estadisticas['total_gastado'] . "<br>";
        echo "Promedio de compra: $" . $estadisticas['promedio_compra'] . "<br>";
        echo "Últimos productos: " . $estadisticas['ultimos_productos'] . "<br>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


// Función para procesar una devolución
function procesarDevolucion($pdo, $venta_id, $producto_id, $cantidad) {
    $query = "CALL sp_procesar_devolucion(?, ?, ?)";
    
    try {
        $stmt = $pdo->prepare($query);
        $stmt->execute([$venta_id, $producto_id, $cantidad]);
        echo "<br>Devolución procesada con éxito.";
    } catch (Exception $e) {
        echo "Error al procesar la devolución: " . $e->getMessage();
    }
}

// Función para aplicar descuento
function aplicarDescuento($pdo, $cliente_id) {
    $query = "CALL sp_aplicar_descuento(:cliente_id, @descuento)";
    $stmt = $pdo->prepare($query);
    
    try {
        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->execute();

        // Obtener el descuento aplicado
        $result = $pdo->query("SELECT @descuento as descuento")->fetch(PDO::FETCH_ASSOC);
        
        echo "<br>Descuento aplicado: $" . $result['descuento'];
    } catch (Exception $e) {
        echo "Error al aplicar el descuento: " . $e->getMessage();
    }
}

// Función para generar el reporte de bajo stock
function generarReporteBajoStock($pdo) {
    $query = "CALL sp_reporte_bajo_stock()";
    
    try {
        $stmt = $pdo->query($query);
        
        echo "<h3>Reporte de Productos con Bajo Stock</h3>";
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad en Stock</th>
                    <th>Cantidad Sugerida para Reposición</th>
                </tr>";
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['stock']}</td>
                    <td>{$row['cantidad_sugerida']}</td>
                  </tr>";
        }
        echo "</table>";
    } catch (Exception $e) {
        echo "<br>Error al generar el reporte: " . $e->getMessage();
    }
}

function calcularComision($pdo, $venta_id) {
    $query = "CALL sp_calcular_comision(:venta_id)";
    
    try {
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':venta_id', $venta_id, PDO::PARAM_INT);
        $stmt->execute();
        
        $comision_info = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($comision_info) {
            echo "<h3>Comisión por Venta ID: {$comision_info['venta_id']}</h3>";
            echo "Total de la Venta: $" . number_format($comision_info['total_venta'], 2) . "<br>";
            echo "Cantidad de Productos Vendidos: " . $comision_info['cantidad_productos'] . "<br>";
            echo "Comisión Calculada: $" . number_format($comision_info['comision'], 2) . "<br>";
        } else {
            echo "No se encontraron datos para la venta ID: $venta_id.";
        }
    } catch (Exception $e) {
        echo "Error al calcular la comisión: " . $e->getMessage();
    }
}




// Ejemplos de uso
registrarVenta($pdo, 1, 1, 2);
obtenerEstadisticasCliente($pdo, 1);
procesarDevolucion($pdo, 8, 1, 2); //podemos cambiar el id 
aplicarDescuento($pdo, 1); 
generarReporteBajoStock($pdo);
calcularComision($pdo, 1);


$pdo = null;
?>
        