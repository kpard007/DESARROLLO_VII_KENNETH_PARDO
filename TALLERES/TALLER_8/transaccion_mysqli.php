<?php
require_once "config_mysqli.php";

mysqli_begin_transaction($conn);

try {
    // Insertar un nuevo usuario
    $sql = "INSERT INTO usuarios (nombre, email) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt){
            throw new Exception ("Error en la preparación de la consulta: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "ss", $nombre, $email);
    $nombre = "Nuevo Usuario";
    $email = "nuevo@example.com";

    if (!mysqli_stmt_execute($stmt)){
        throw new Exception ("Error al ejecutar la consulta: " . mysqli_stmt_error($stmt));
    }

    $usuario_id = mysqli_insert_id($conn);

    // Insertar una publicación para ese usuario
    $sql = "INSERT INTO publicaciones (usuario_id, titulo, contenido) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt){
        throw new Exception ("Error en la preparacion de la consutla: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "iss", $usuario_id, $titulo, $contenido);
    $titulo = "Nueva Publicación";
    $contenido = "Contenido de la nueva publicación";
    
    if(!mysqli_stmt_execute($stmt)){
        throw new Exception ("Error al ejecutar la consulta: " . mysqli_stmt_error($stmt));
    }


    mysqli_commit($conn);
    echo "Transacción completada con éxito.";
} catch (Exception $e) {
    mysqli_rollback($conn);
    logError($e->getMessage());
    echo "Error en la transacción: " . $e->getMessage();
}

mysqli_close($conn);

function logError($mensaje){
    $archivo = 'error_log.txt';
    $actual = "[" . date ("Y-m-d H:i:s") . "]" . $mensaje . PHP_EOL;
    file_put_contents($archivo, $actual, FILE_APPEND);
}
?>
        