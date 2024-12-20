<?php
function sanitizarNombre($nombre){
    return htmlspecialchars(trim($nombre), ENT_QUOTES, 'UTF-8' );
}

function sanitizarEmail($email){
    return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
}

function sanitizarEdad($edad){
    return filter_var(trim($edad), FILTER_SANITIZE_NUMBER_INT);
}

function sanitizarFechaNacimiento($fecha){
    return htmlspecialchars(trim($fecha), ENT_QUOTES, 'UTF-8');
}

function sanitizarGenero($genero){
    return htmlspecialchars(trim($genero), ENT_QUOTES, 'UTF-8');
}

function sanitizarIntereses($intereses) {
    return array_map(function($interes) {
        return htmlspecialchars(trim($interes), ENT_QUOTES, 'UTF-8');
    }, $intereses);
}

function sanitizarComentarios ($comentarios){
    return htmlspecialchars(trim($comentarios), ENT_QUOTES, 'UTF-8');
}