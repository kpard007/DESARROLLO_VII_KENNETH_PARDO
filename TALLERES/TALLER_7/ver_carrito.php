<?php
include 'config_sesion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
</head>
<body>
    <h2>Carrito de Compras</h2>
    <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0): ?>
        <ul>
            <?php
            $total = 0;
            foreach ($_SESSION['carrito'] as $producto => $detalles) {
                $subtotal = $detalles['precio'] * $detalles['cantidad'];
                $total += $subtotal;
                echo "<li>Producto $producto - Precio: $" . $detalles['precio'] . " - Cantidad: " . $detalles['cantidad'] . 
                " - Subtotal: $" . $subtotal . " <a href='eliminar_del_carrito.php?producto=$producto'>Eliminar</a></li>";
            }
            ?>
        </ul>
        <p>Total: $<?php echo $total; ?></p>
        <a href="checkout.php">Finalizar Compra</a>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>
    <a href="productos.php">Volver a productos</a>
</body>
</html>
