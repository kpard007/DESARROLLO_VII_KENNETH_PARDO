<?php
include 'config_sesion.php';

// Validar y sanitizar datos
$producto = htmlspecialchars($_GET['producto']);
$precio = htmlspecialchars($_GET['precio']);

// Añadir producto al carrito
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (!isset($_SESSION['carrito'][$producto])) {
    $_SESSION['carrito'][$producto] = ['cantidad' => 1, 'precio' => $precio];
} else {
    $_SESSION['carrito'][$producto]['cantidad'] += 1;
}

header("Location: ver_carrito.php");
exit();
?>
