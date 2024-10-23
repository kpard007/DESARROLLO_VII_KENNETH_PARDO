<?php
include 'config_sesion.php';


if(!isset($_SESSION['user'])) {
    header("Location: sesionProfesor.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Profesor</title>
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
    <p>Calificaciones de estudiantes: </p>
    <a href="cerrarSesion.php">Cerrar Sesión</a>
</body>
</html>