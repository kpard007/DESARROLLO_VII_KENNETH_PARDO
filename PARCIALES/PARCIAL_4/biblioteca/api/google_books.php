<?php

// Incluir el archivo de configuración con las credenciales
$config = require_once '../config.php';

// Función para buscar libros utilizando la clave API de Google Books
function buscarLibros($query, $config) { 
    
    // Obtener la clave API desde el archivo config.php
    $api_key = $config['google_books_api_key'];

    // Construir la URL de la API de Google Books
    $api_url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($query) . "&key=" . $api_key;

    // Realizar la solicitud HTTP a la API
    $response = file_get_contents($api_url);

    // Verificar si la respuesta es válida
    if ($response !== false) {
        // Convertir la respuesta JSON en un array de PHP
        $data = json_decode($response, true);
        
        // Verificar si hay libros en los resultados
        if (isset($data['items'])) {
            return $data['items']; 
        } else {
            return null; 
        }
    } else {
        return null; 
    }
}

