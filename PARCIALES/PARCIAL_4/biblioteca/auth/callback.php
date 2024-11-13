<?php

require_once '../modelo/Usuario.php';
require_once '../controladores/UsuarioControlador.php';

session_start();

// Cargar credenciales desde config.php
$config = require __DIR__ . '/../../config.php';

$client_id = $config['google_oauth_client_id'];
$client_secret = $config['google_oauth_client_secret'];
$redirect_uri = $config['redirect_uri'];

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Intercambiar el código por un token de acceso
    $token_url = 'https://accounts.google.com/o/oauth2/token';
    $token_data = [
        'code' => $code,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code',
    ];

    $options = [
        'http' => [
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($token_data),
        ]
    ];
    $context = stream_context_create($options);
    $response = file_get_contents($token_url, false, $context);

    $json_response = json_decode($response, true);
    if (isset($json_response['access_token'])) {
        // Guardar el token en la sesión
        $_SESSION['access_token'] = $json_response['access_token'];

        // Usar el token para obtener información del usuario
        $user_info_url = 'https://www.googleapis.com/oauth2/v2/userinfo?access_token=' . $json_response['access_token'];
        $user_info = file_get_contents($user_info_url);
        $user_data = json_decode($user_info, true);

        // Guardar el user_id (ID de Google) en la sesión
        $_SESSION['user_id'] = $user_data['id']; // Esto es el Google user ID
        $google_id = htmlspecialchars($user_data['id'], ENT_QUOTES, 'UTF-8');
        $nombre = htmlspecialchars($user_data['name'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($user_data['email'], ENT_QUOTES, 'UTF-8');

        // Crear un objeto Usuario con los datos de Google
        $usuario = Usuario::crearDesdeGoogle([
            'google_id' => $google_id,
            'nombre' => $nombre,
            'email' => $email
        ]);

        if (UsuarioControlador::registrarUsuario($usuario)) {
            // Usuario registrado con éxito
            header('Location: /PARCIALES/PARCIAL_4/biblioteca/index.php');
        } else {
            // El usuario ya estaba registrado
            header('Location: /PARCIALES/PARCIAL_4/biblioteca/index.php');
        }
        exit();
    } else {
        echo "Error al obtener el token de acceso.";
    }
} else {
    echo "No se recibió el código de autorización.";
}
