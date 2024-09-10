<?php
//patron de traignulo rectangulo
echo "<h3>Patrón de triángulo rectángulo</h3>";
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}

// secuencua de numeros del 1 al 20 mostrando solo los impares
echo "<h3>Números impares del 1 al 20</h3>";
$numero = 1;
while ($numero <= 20) {
    if ($numero % 2 != 0) {
        echo $numero . "<br>";
    }
    $numero++;
}

// cuenta regresiva de 10 a 1 pasando por alto el numero 5
echo "<h3>Contador regresivo </h3>";
$contador = 10;
do {
    if ($contador != 5) {
        echo $contador . "<br>";
    }
    $contador--;
} while ($contador > 0);
?>
