
<?php
$paginaActual = 'inicio'; // Cambia esto según el archivo
require_once 'plantillas/funciones.php';
$tituloPagina = obtenerTituloPagina($paginaActual);
include 'plantillas/encabezado.php';
$fecha = date ('d/m/y');
?>

<h2>Contenido sobre nosotros</h2>
<p>Contenido de sobre nosotros</p>
<p>Nuestra pagina fue creada en <?=$fecha?> y creada por kenneth</p>


<?php
include 'plantillas/pie_pagina.php';
?>