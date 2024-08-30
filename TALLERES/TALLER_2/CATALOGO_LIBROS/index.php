<?php
// index.php
include 'includes/funciones.php';
include 'includes/header.php';

// Obtener la lista de libros
$libros = obtenerLibros();
?>

<div class="libros">
    <?php
    foreach ($libros as $libro) {
        echo mostrarDetallesLibro($libro);
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
