
<?php
echo "<h2>Operadores de Comparación</h2>";

$a = 5;
$b = '5';
$c = 10;
$d = 15;

echo "Variables: a = $a (integer), b = '$b' (string), c = $c (integer)<br><br>";
echo " '===' para comparar caracteres '==' para comparar numeros<br><br>";
echo "igual  a == b: ";
var_dump($a == $b);
echo "<br>";

echo " identico a === b: ";
var_dump($a === $b);
echo "<br>";

echo "Diferente a != c: ";
var_dump($a != $c);
echo "<br>";

echo "No idéntico a !== b: ";
var_dump($a !== $b);
echo "<br><br>";

echo "a < c: ";
var_dump($a < $c);
echo "<br>";

echo "a > c: ";
var_dump($a > $c);
echo "<br>";

echo "a <= c: ";
var_dump($a <= $b);
echo "<br>";

echo "a >= c: ";
var_dump($a >= $c);
echo "<br><br>";

// Operador de nave espacial (PHP 7+)
//devuelve 1 si a > c, devuelve 0 si a == c y devuelce -1 si a < c 
echo "Operador de nave espacial  a <=> c: ";
var_dump($a <=> $c);
echo "<br>";

// Operador de fusión de null (PHP 7+)
$d = null;
$e = $d ?? 'valor por defecto';
echo "Operador de fusión de null (??): $e<br>";

?>
    
							
