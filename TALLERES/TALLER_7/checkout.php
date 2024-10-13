<?php
include 'config_sesion.php';

if (isset($_SESSION['carrito'])) {
    // Calcular el total de la compra
    $total = 0;
    foreach ($_SESSION['carrito'] as $producto => $detalles) {
        $total += $detalles['precio'] * $detalles['cantidad'];
    }

    // Guardar el nombre del usuario en una cookie (por ejemplo, "cliente")
    setcookie("usuario", "cliente", time() + 86400, "", "", true, true);

    // Vaciar el carrito
    unset($_SESSION['carrito']);

    echo "<h2>Compra finalizada</h2>";
    echo "<p>Total pagado: $$total</p>";
    echo "<a href='productos.php'>Volver a productos</a>";
} else {
    echo "<p>No hay productos en el carrito.</p>";
}
?>
