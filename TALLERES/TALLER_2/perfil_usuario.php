
<?php

$nombre_completo = "Kenneth Pardo";  
$edad = 22;  
$correo = "kennethpardo3@gmail.com";  
$telefono = "6342-7090";  


define("OCUPACION", "agente de servicio al cliente");  

// parrafo con mi informacion personal
echo "<p>"; 
print "Hola, mi nombre es ";  
print $nombre_completo;  
print " y tengo ";  
print $edad;  
print " años. Mi dirección de correo electrónico es ";  
print $correo;  
print " y mi número de teléfono es ";  
print $telefono; 
printf(". Actualmente, trabajo como %s y trabajo en la empresa Foundever Panamá.", OCUPACION);  

//variables y cadatipo de valor
echo "<pre>";
var_dump($nombre_completo);
var_dump($edad);
var_dump($correo);
var_dump($telefono);
var_dump(OCUPACION);
echo "</pre>";
?>
