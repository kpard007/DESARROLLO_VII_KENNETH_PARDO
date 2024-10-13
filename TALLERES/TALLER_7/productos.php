<?php
include 'config_sesion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
</head>
<body>
    <h2>Lista de Productos</h2>
    <ul>
        <li>Chancletas 1 - $10 <a href="agregar_al_carrito.php?producto=1&precio=10">Añadir al carrito</a></li>
        <li>Cutarras 2 - $15 <a href="agregar_al_carrito.php?producto=2&precio=15">Añadir al carrito</a></li>
        <li>Crocs 4 - $25 <a href="agregar_al_carrito.php?producto=4&precio=25">Añadir al carrito</a></li>
        <li>Asics 5 - $30 <a href="agregar_al_carrito.php?producto=5&precio=30">Añadir al carrito</a></li>
    </ul>
    <a href="ver_carrito.php">Ver Carrito</a>
</body>
</html>
