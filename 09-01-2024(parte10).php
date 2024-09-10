
<?php
echo "<h2>Estructuras Condicionales: if, else, elseif</h2>";

// Ejemplo básico de if
$edad = 18;
if ($edad >= 18) {
    echo "Eres mayor de edad.<br><br>";
}
echo "<br><br>";
$numero = '4'; 
if ($numero === 5){
    echo "el numero es correto";
}
else 
    echo "el numero es incorrecto";
echo "<br><br>";

// Ejemplo de if-else
$tienePermiso = true;
if ($tienePermiso != false) {
    echo "Tienes permiso para acceder.<br>";
} else {
    echo "No tienes permiso para acceder.<br><br>";
}

// Ejemplo de if-elseif-else
$calificacion = 85;
if ($calificacion >= 90) {
    echo "Tu calificación es A.<br>";
} elseif ($calificacion >= 80) {
    echo "Tu calificación es B.<br>";
} elseif ($calificacion >= 70) {
    echo "Tu calificación es C.<br>";
} elseif ($calificacion >= 60) {
    echo "Tu calificación es D.<br>";
} else {
    echo "Tu calificación es F.<br>";
}



echo "<br><br>";
$brawler = "mortis";
if ($brawler == "mortis"){
    echo "Tu brawler favorito es mitico";
}
else if ($brawler == "pam"){
    echo "echo Tu brawler favorito es mitico";
}
else 
    "No tienes un brawler favorito";

echo "<br><br>";


// Anidación de estructuras if
$esUsuario = true;
$esAdmin = false;
if ($esUsuario) {
    echo "Bienvenido, usuario.<br>";
    if ($esAdmin) {
        echo "Tienes privilegios de administrador.<br>";
    } else {
        echo "No tienes privilegios de administrador.<br>";
    }
} else {
    echo "Por favor, inicia sesión.<br>";
}
echo "<br>";

// Uso de operadores lógicos en condiciones
$usuario = "admin";
$contrasena = "12345";
if ($usuario === "admin" && $contrasena === "12345") {
    echo "Inicio de sesión exitoso como administrador.<br>";
} elseif ($usuario === "admin" || $contrasena === "12345") {
    echo "Usuario o contraseña incorrectos.<br>";
} else {
    echo "Acceso denegado.<br>";
}
echo "<br>";

// Sintaxis alternativa para estructuras de control
$esDiaLaboral = true;
if ($esDiaLaboral):
    echo "A trabajar.<br>";
else:
    echo "A descansar.<br>";
endif;

?>
    
