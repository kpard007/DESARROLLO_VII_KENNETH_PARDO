<?php
include 'configurarSesion.php';
require_once 'autenticacion.php';


if(isset($_SESSION['user'])) {
    header("Location: panel.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION ['csrf_token']){
                die ("Error de validacion de csrf");
         }
         $user = $_POST['user'];
         $pass = $_POSDT['pass'];

         foreach ($usuarios as $usuario){
            $usuario = [$user];
         }
         foreach ($contraseñas as $contra){
            $contra = [$pass];
         }



}

?>

<!DOCTYPE html>

    <head>Login Profesor</head>
    
    <form action = "procesar.php" method ="POST" enctype="multipart/form-data">
    <br>
    <label for="user">Usuario:</label><br>
        <input type="text" id="user" name="usuario" required><br><br>
        <label for="pass">Contraseña:</label><br>
        <input type="password" id="pass" name="pass" required><br><br>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="submit" value="Iniciar Sesión profesor">
    </form>

</html>