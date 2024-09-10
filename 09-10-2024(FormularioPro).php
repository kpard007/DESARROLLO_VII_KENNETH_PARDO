
<?php
// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y sanitizar los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST['mensaje'] ?? '');

    // Validar los datos
    $errores = [];

    if (empty($nombre)) {
        $errores[] = "El nombre es requerido";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email no es válido";
    }

    if (empty($mensaje)) {
        $errores[] = "El mensaje es requerido";
    }

    // Procesar o mostrar errores
    if (empty($errores)) {
        echo "Formulario procesado correctamente";
        // Aquí iría el código para procesar los datos (por ejemplo, guardar en base de datos)
    } else {
        echo "Se encontraron los siguientes errores:<br>";
        foreach ($errores as $error) {
            echo "- $error<br>";
        }
    }
} else {
    echo "Acceso no permitido";
}
?>