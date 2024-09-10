<?php

include 'includes/header.php';
include 'includes/funciones.php';

$cursos = obtenerCursos();
?>

<div class = "curso">
    <?php
    foreach($cursos as $curso){
        echo mostrarDetallesCurso($curso);
    }
    ?>
</div>
<?php include 'includes/footer.php';?>


