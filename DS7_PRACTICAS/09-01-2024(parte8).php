
<?php
echo "<h2>Operadores Lógicos</h2>";

$V = true;
$F = false;

echo "Variables: V = " . var_export($V, true) . ",F = " . var_export($F, true) . "<br><br>";

// Operador AND (&&)
echo "and (&&) <br>";
echo "V && V = " . var_export($V && $V, true) . "<br>";
echo "V && F = " . var_export($V && $F, true) . "<br>";
echo "F && F = " . var_export($F && $F, true) . "<br><br>";


// Operador OR (||)
echo "OR (||):<br>";

echo "V || V = " . var_export ($V || $V, true). "<br>";
echo "V || F = " .var_export ($V || $F, true). "<br>";
echo "F || F = " .var_export ($F || $F, true). "<br>";

// Operador NOT (!)
echo "NOT (!):<br>";
echo "!V = " . var_export(!$V, true) ."<br>";
echo "!F = " . var_export (!$F, true) . "<br>";


// Operador XOR
echo "XOR:<br>";
echo "V XOR V = " . var_export($V xor $V, true) . "<br>";
echo "V XOR falso = " . var_export($V xor $F, true) . "<br>";
echo "F XOR F = " . var_export($F xor $F, true) . "<br><br>";

// Ejemplo práctico
$edad = 25;
$tieneLicencia = true;

$puedeConducir = ($edad >= 18) && $tieneLicencia;
echo "Ejemplo práctico:<br>";
echo "Edad: $edad, Tiene licencia: " . var_export($tieneLicencia, true) . "<br>";
echo "¿Puede conducir? " . var_export($puedeConducir, true) . "<br><br>";

echo "<br><br>";
$edad1 = 17; 
$puedeFumar = true; 

if ($puedeFumar = ($edad1 >= 18) && $puedeFumar == true){
    echo "Ejemplo practico: <br>";
    echo "Edad: $edad1, puede fumar?: " . var_export($puedeFumar, true);
}
else 
    echo "No tienes la edad! no puedes fumar";

echo "<br><br>";



// Demostración de cortocircuito
echo "Demostración de cortocircuito:<br>";
$x = false;
$y = true;
$result = $x && $y; // $y no se evalúa porque $x es falso
echo "false && true = " . var_export($result, true) . " (y no se evalúa)<br>";

$result = $x || $y; // $y se evalúa porque $x es falso
echo "false || true = " . var_export($result, true) . " (y se evalúa)<br>";

?>
    
