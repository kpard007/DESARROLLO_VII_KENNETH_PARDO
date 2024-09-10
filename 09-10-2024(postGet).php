<?php
// Ejemplo de manejo seguro de datos de formulario

// Función para sanitizar datos
function sanitizar($dato) {
    return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
}

// Verificar el método de solicitud
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar y validar datos
    $nombre = sanitizar($_POST['nombre'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $contrasena = $_POST['contrasena'] ?? '';

    // Validación
    $errores = [];
    if (empty($nombre)) $errores[] = "El nombre es requerido";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = "Email inválido";
    if (strlen($contrasena) < 8) $errores[] = "La contraseña debe tener al menos 8 caracteres";

    // Procesar si no hay errores
    if (empty($errores)) {
        // Hash de la contraseña
        $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
        
        // Aquí iría el código para guardar los datos en la base de datos
        echo "Datos procesados correctamente";
    } else {
        foreach ($errores as $error) {
            echo $error . "<br>";
        }
    }
} else {
    echo "Método de solicitud no permitido";
}
?>