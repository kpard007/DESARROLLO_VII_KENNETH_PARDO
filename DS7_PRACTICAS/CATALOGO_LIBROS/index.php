<?php
include 'includes/funciones.php';
include 'includes/header.php';

$libros = obtener_libros();

?>

<div class = "libros">
    <?php
        foreach ($libros as $libro){
            echo mostrarDetallesLibro($libro);
            echo "<br><br>";
        }
    ?>
</div>

<?php
include 'includes/footer.php'
?>


