<?php
$nombre = "Kenneth Pardo";
$edad = 22;
$correo = "kennethpardo3@gmail.com";
$telefono = "6715-9433";

define ("OCUPACION", "estudiante");

echo "Hola, mi nombre es $nombre tengo $edad años y mi direccion de correo es $correo, tambien mi numero de contacto es $telefono";
echo "no  puede ser";
echo "<br><br>";

print ("Mi nombre es ". $nombre . " y tengo " . $edad . " años". " mi telefono es " . $telefono);
echo "<br><br>";
printf ("Mi nombre es ".$nombre . " tengo ". $edad . " y soy " .OCUPACION . " de la utp");

echo "<br><br>";
var_dump($nombre);
echo "<br><br>";
var_dump($edad);
echo "<br><br>";
var_dump($correo);
echo "<br><br>";
var_dump($telefono);
echo "<br><br>";
var_dump(OCUPACION);



















?>