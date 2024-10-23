<?php
include 'config_sesion.php';


if(!isset($_SESSION['user'])) {
    header("Location: sesionEstudiante.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estudiante</title>
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
    <p>Tu calificacion: </p>
    <a href="cerrarSesion.php">Cerrar Sesión</a>
</body>
</html>