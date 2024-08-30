
<?php
$paginaActual = 'inicio'; // Cambia esto según el archivo
require_once 'plantillas/funciones.php';
$tituloPagina = obtenerTituloPagina($paginaActual);
include 'plantillas/encabezado.php';
$numero_contacto = "6715-9433";
?>

<h2>Contenido de la Página de Contacto</h2>
<p>Contenido de la página de contacto</p>
<p>Numero de contacto: <?=$numero_contacto?></p>

<?php
include 'plantillas/pie_pagina.php';
?>