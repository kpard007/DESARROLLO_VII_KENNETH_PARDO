<?php
function validarNombre($nombre){
return !empty($nombre) && strlen($nombre)<= 50;
}

function validarEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function validarEdad($edad){
    return is_numeric($edad) && $edad >= 18 && $edad <= 120;
}

function validarSitioWeb ($sitioWeb){
    return empty($sitioWeb) || filter_var($sitioWeb, FILTER_VALIDATE_URL);
}
function validarGenero($genero){
    $generosValidos = ['Masculino','Femenino', 'Otro'];
    return in_array($genero, $generosValidos);
}

function validarIntereses($intereses){
    $interesesValidos = ['deportes', 'musica', 'lectura'];
    return !empty($intereses) && count (array_intersect($intereses, $interesesValidos)) === count ($intereses);
}
function validarComentarios($comentarios){
    return strlen($comentarios) <= 500;
}

function validarFotoPerfil($archivo){
    $tiposPermitidos = ['image/jpeg', 'image/png','image/gif'];
    $tamañoMaximo = 1 * 1024 * 1024; //equivalente a 1MB

    if ($archivo ['error'] !== UPLOAD_ERR_OK){
        return false;
    }
    if (!in_array($archivo['type'], $tiposPermitidos)){
        return false;
    }
    if ($archivo['size'] > $tamañoMaximo){
        return false;
    }
    return true;
}
?>