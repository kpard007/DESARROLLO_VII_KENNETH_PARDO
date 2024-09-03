<?php
//triangulo rectangulo con bucle for
for ($t = 1; $t <= 5; $t++){
    for ($r = 1; $r <= $t; $r++){
        echo "*";
    }
    echo "<br>";
}
 /*
 
Utilizando un bucle while, genera una secuencia de números del 1 al 20, 
pero solo muestra los números impares.
Con un bucle do-while, crea un contador regresivo desde 10 hasta 1, pero salta el número 5. 
 */
$num = 1; 
while ($num < 20){
    if ($num % 2 != 0){
        echo "$num<br>";
    }
    $num ++;

}
$numero2 = 10;
 
$numero = 10;
do {
    if ($numero == 5){
        echo (" ");
    }
    else 
    echo ("<br>$numero");
    $numero --;

 }while ($numero != 0)

/*
10



*/
?>