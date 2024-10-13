<?php
function validarNombre($nombre) {
    return !empty($nombre) && strlen($nombre) <= 50;
}

function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validarEdad($edad) {
    return is_numeric($edad) && $edad >= 18 && $edad <= 120;
}

function validarFechaNacimiento($fecha) {
    //checamos que la edad no este vacia 
    if (empty($fecha) || !strtotime($fecha)) {
        return false;
    }
    
    $fecha_actual = new DateTime();
    $fecha_nacimiento = new DateTime($fecha);
    $diferencia = $fecha_actual->diff($fecha_nacimiento);
    
    return $diferencia->y >= 18;
}


function validarSitioWeb($sitioWeb) {
    return empty($sitioWeb) || filter_var($sitioWeb, FILTER_VALIDATE_URL);
}

function validarGenero($genero) {
    $generosValidos = ['masculino', 'femenino', 'otro'];
    return in_array($genero, $generosValidos);
}

function validarIntereses($intereses) {
    $interesesValidos = ['deportes', 'musica', 'lectura'];
    return !empty($intereses) && count(array_intersect($intereses, $interesesValidos)) === count($intereses);
}

function validarComentarios($comentarios) {
    return strlen($comentarios) <= 500;
}

function validarFotoPerfil($archivo) {
    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
    $tamanoMaximo = 1 * 1024 * 1024; // 1MB

    if ($archivo['error'] !== UPLOAD_ERR_OK) {
        return false;
    }

    if (!in_array($archivo['type'], $tiposPermitidos)) {
        return false;
    }

    if ($archivo['size'] > $tamanoMaximo) {
        return false;
    }

    return true;
}


if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
    $nombre_original = $_FILES['foto_perfil']['name'];
    $extension = pathinfo($nombre_original, PATHINFO_EXTENSION);
    $nombre_unico = uniqid('foto_', true) . '.' . $extension;
    $ruta_destino = 'uploads/' . $nombre_unico;

    // se mueve el archivo a la carpeta destino
    if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $ruta_destino)) {
        echo "Foto subida con éxito";
    } else {
        echo "Ha ocurrido un error al subir la foto";
    }
}

?>