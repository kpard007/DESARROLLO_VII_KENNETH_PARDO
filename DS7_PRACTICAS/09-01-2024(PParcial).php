<?php

echo "Hola mundo";
//PRACTICA N1
$nombre = "Juan";
$edad = 25;
$altura = 1.75;
$esEstudiante = true;

echo "Nombre: $nombre<br>";
echo "Edad: $edad<br>";
echo "Altura: $altura<br>";
echo "¿Es estudiante? " . ($esEstudiante ? "Sí" : "No");

echo "<br><br>";

$nombre = "Kenneth";
$edad = 22;
$estatura = 1.70;
$esEstudianteNuevo = true;
 echo "Nombre: $nombre <br>";
 echo "Edad: $edad <br>";
 echo "Estatura: $estatura cm <br>";
 echo "¿Es $nombre un nuevo estudiante? " . ($esEstudianteNuevo ? "Sí, es nuevo" : "No, no es nuevo");
    

 echo "<br><br>";

 
//PRACTICA N2 
$nombre = "Juan";
$edad = 25;

// Concatenación usando el operador .
$presentacion1 = "Hola, mi nombre es " . $nombre . " y tengo " . $edad . " años.";

// Concatenación dentro de comillas dobles
$presentacion2 = "Hola, mi nombre es $nombre y tengo $edad años.";

// Definición de una constante
define("SALUDO", "¡Bienvenido!");

// Concatenación con constante
$mensaje = SALUDO . " " . $nombre;

echo $presentacion1 . "<br>";
echo $presentacion2 . "<br>";
echo $mensaje . "<br>";
                    
echo "<br><br>";
$nombre1 = "Kenneth";
$edad1 = 22;

$introduceYourself = "Hola! mi nombre es " . $nombre1 . " y tengo " . $edad1 . " años";
$introduceYourselfpt2 = "Hola, mi nombre es $nombre1 y tengo $edad1 años."; 

define ("GREETING", "¡WELCOME!");
$MESSAGE = GREETING . " " . $nombre1;
echo $MESSAGE . "<br>";


echo $introduceYourself . "<br>";
echo $introduceYourselfpt2 . "<br>";

?>