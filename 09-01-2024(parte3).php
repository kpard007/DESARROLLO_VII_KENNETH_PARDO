
<?php
// Definición de variables
$nombre = "María";
$edad = 30;
$ciudad = "Madrid";

// Definición de constante
define("PROFESION", "Ingeniera");

// Creación de mensaje usando diferentes métodos de concatenación e impresión
$mensaje1 = "Hola, mi nombre es " . $nombre . " y tengo " . $edad . " años.";
$mensaje2 = "Vivo en $ciudad y soy " . PROFESION . ".";

echo $mensaje1 . "<br>";
print($mensaje2 . "<br>");

printf("En resumen: %s, %d años, %s, %s<br>", $nombre, $edad, $ciudad, PROFESION);

echo "<br>Información de debugging:<br>";
var_dump($nombre);
echo "<br>";
var_dump($edad);
echo "<br>";
var_dump($ciudad);
echo "<br>";
var_dump(PROFESION);
echo "<br>";


echo "<br><br>";

$nombre1 = "Kenneth Pardo";
$edad1 = 22;
$pais ="Panamá";

define ("DUTY", "programador");
$salida = "Hola mi nombre es " .$nombre1 ." y tengo ". $edad1 ." años, soy de " .$pais. " y trabajo como ".DUTY;
echo "$salida";

echo "<br>";
printf("Resumen: %s, %d años, %s, %s<br>", $nombre1, $edad1, $pais, DUTY);

var_dump($nombre1);
echo "<br>";
var_dump($edad1);
echo "<br>";
var_dump($pais);
echo "<br>";
var_dump(DUTY);
echo "<br>";

?>
                    
