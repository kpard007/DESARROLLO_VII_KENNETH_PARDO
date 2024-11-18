<?php
function loadEnv($file) {
    if (!file_exists($file)) {
        throw new Exception("El archivo de configuración .env no existe.");
    }

    $content = file_get_contents($file);
    $lines = explode("\n", $content);
    
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line && strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            putenv(trim($key) . '=' . trim($value));
        }
    }
}