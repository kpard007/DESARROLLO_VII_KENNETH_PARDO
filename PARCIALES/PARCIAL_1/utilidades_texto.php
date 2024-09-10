<?php

function contar_palabras($texto){
    return str_word_count($texto);
}


function contar_vocales($texto){
    $texto = strtolower($texto);
    $vocales = preg_match_all('/[aeiou]/', $texto);
    return $vocales;
}

function invertir_palabras($texto){
    $palabras = explode(' ', $texto);
    $palabras_invertidas = array_reverse($palabras);
    return implode(' ', $palabras_invertidas);
}              
?>