<?php
function validarUsuario($user){
    return !empty($user) && strlen($user) >= 3 && strlen($user) <= 20;
}

function validarContraseña($pass){
    return !empty($pass) && strlen ($pass) >= 5 && strlen ($pass) <= 20;
}
