<?php
include 'config_sesion.php';

$producto = htmlspecialchars($_GET['producto']);

// Eliminar producto del carrito
if (isset($_SESSION['carrito'][$producto])) {
    unset($_SESSION['carrito'][$producto]);
}

header("Location: ver_carrito.php");
exit();
?>
