
<?php
// Ejemplo básico de strtoupper()
$textoMixto = "HoLa MuNdO";
$textoMayusculas = strtoupper($textoMixto);
echo "Texto original: $textoMixto</br>";
echo "Texto en mayúsculas: $textoMayusculas</br>";

// Ejemplo con una frase
$frase = "php es un lenguaje de programación";
$fraseMayusculas = strtoupper($frase);
echo "</br>Frase original: $frase</br>";
echo "Frase en mayúsculas: $fraseMayusculas</br>";

// Ejercicio: Convierte el nombre de tu ciudad y país a mayúsculas
$ciudad = "Panama";
$pais = "Panama";
$ciudadMayusculas = strtoupper($ciudad);
$paisMayusculas = strtoupper($pais);
echo "</br>Tu ciudad en mayúsculas: $ciudadMayusculas</br>";
echo "Tu país en mayúsculas: $paisMayusculas</br>";

// Bonus: Crear un encabezado para un documento
function crearEncabezado($texto) {
    return str_pad(strtoupper($texto), strlen($texto) + 4, "*", STR_PAD_BOTH);
}

$tituloDocumento = "Informe importante numero 1";
echo "</br>" . crearEncabezado($tituloDocumento) . "</br>";

// Extra: Convertir un array de strings a mayúsculas
$frutas = ["manzana", "banana", "cereza", "dátil"];
$frutasMayusculas = array_map('strtoupper', $frutas);
echo "</br>Frutas originales:</br>";
print_r($frutas);
echo "Frutas en mayúsculas:</br>";
print_r($frutasMayusculas);

// Desafío: Crea una función que convierta a mayúsculas solo la primera letra de cada palabra
function primerLetraMayuscula($frase) {
    $palabras = preg_split('/(\s+|[\p{P}])/u', $frase, -1, PREG_SPLIT_DELIM_CAPTURE);

    $palabrasModificadas = array_map(function($palabra) {
        if (preg_match('/\p{L}/u', $palabra)) {
            return strtoupper(substr($palabra, 0, 1)) . strtolower(substr($palabra, 1));
        }
        // Devolver la palabra sin cambios si no es una palabra (por ejemplo, puntuación)
        return $palabra;
    }, $palabras);
    
    return implode(" ", $palabrasModificadas);
}

$fraseOriginal = "esta es una frase de prueba con apótrofes y guiones (ejemplo-ejem)";
$fraseModificada = primerLetraMayuscula($fraseOriginal);
echo "</br>Frase original: $fraseOriginal</br>";
echo "Frase modificada: $fraseModificada</br>";
?>
      
