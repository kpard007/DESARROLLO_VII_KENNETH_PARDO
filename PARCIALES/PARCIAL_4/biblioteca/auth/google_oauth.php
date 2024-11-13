<?php
session_start();

// Cargar credenciales desde config.php
$config = require __DIR__ . '/../../config.php';

$client_id = $config['google_oauth_client_id'];
$redirect_uri = $config['redirect_uri'];

// Permiso necesario para obtener también el nombre de usuario
$scope = 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile';

// Redirige a Google para autenticarse
$auth_url = "https://accounts.google.com/o/oauth2/auth?" . http_build_query([
    'response_type' => 'code',
    'client_id' => $client_id,
    'redirect_uri' => $redirect_uri,
    'scope' => $scope,
    'access_type' => 'offline'
]);

header('Location: ' . $auth_url);
exit();
