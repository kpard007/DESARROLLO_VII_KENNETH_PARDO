
<?php
// Ejemplo básico de rand()
echo "Número aleatorio: " . rand() . "</br>";

// Generar número aleatorio en un rango específico
$min = 1;
$max = 10;
echo "Número aleatorio entre $min y $max: " . rand($min, $max) . "</br>";

// Ejercicio: Simular el lanzamiento de un dado
function lanzarDado() {
    return rand(1, 10);
}

echo "</br>Lanzamiento de dado: " . lanzarDado() . "</br>";

// Simular múltiples lanzamientos
$lanzamientos = 20;
echo "Resultados de $lanzamientos lanzamientos:</br>";
for ($i = 0; $i < $lanzamientos; $i++) {
    echo lanzarDado() . " ";
}
echo "</br>";

// Bonus: Generar una contraseña aleatoria
function generarContraseña($longitud = 10) {
    $caracteres = 'KOKOWE COWIEIO IWEMOWIMEOIFWMEO OIWMEOIWMFOOMDWIUNTUBTUV WE 23186189108918/491*';
    $contraseña = '';
    for ($i = 0; $i < $longitud; $i++) {
        $contraseña .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $contraseña;
}

echo "</br>Contraseña aleatoria: " . generarContraseña() . "</br>";
echo "Contraseña aleatoria (12 caracteres): " . generarContraseña(12) . "</br>";

// Extra: Seleccionar elemento aleatorio de un array
$frutas = ['manzana', 'banana', 'naranja', 'uva', 'pera'];
$frutaAleatoria = $frutas[rand(0, count($frutas) - 1)];
echo "</br>Fruta seleccionada aleatoriamente: $frutaAleatoria</br>";

// Desafío: Implementar un generador de lotería
function generarNumerosLoteria($cantidadNumeros, $minimo, $maximo) {
    $numeros = [];
    while (count($numeros) < $cantidadNumeros) {
        $numero = rand($minimo, $maximo);
        if (!in_array($numero, $numeros)) {
            $numeros[] = $numero;
        }
    }
    sort($numeros);
    return $numeros;
}

$numerosLoteria = generarNumerosLoteria(6, 1, 49);
echo "</br>Números de lotería generados: " . implode(", ", $numerosLoteria) . "</br>";

// Ejemplo adicional: Simular probabilidades
function simularProbabilidad($probabilidad) {
    return rand(1, 100) <= $probabilidad;
}

$intentos = 1000;
$exitos = 0;
$probabilidad = 30; // 30% de probabilidad

for ($i = 0; $i < $intentos; $i++) {
    if (simularProbabilidad($probabilidad)) {
        $exitos++;
    }
}

echo "</br>Simulación de probabilidad ($probabilidad%):</br>";
echo "Éxitos: $exitos de $intentos intentos (" . ($exitos / $intentos * 100) . "%)</br>";

// adivinar el numero
function adivinarNumero($intentos) {
    $numeroSecreto = rand(1, 20);
    echo "</br>Piensa en un número entre 1 y 20!</br>";

    for ($i = 1; $i <= $intentos; $i++) {
        echo "Intento #$i: ";
        $adivinanza = rand(1, 20); 
        echo "$adivinanza.</br>";

        if ($adivinanza == $numeroSecreto) {
            echo "!Adivinaste el número! en el intento $i.</br>";
            return;
        } elseif ($adivinanza < $numeroSecreto) {
            echo "El número es mayor que $adivinanza.</br>";
        } else {
            echo "El número es menor que $adivinanza.</br>";
        }
    }

    echo "Lo siento, no lograste adivinar el número. Era $numeroSecreto.</br>";
}
// Jugar con 5 intentos
adivinarNumero(5);

?>
      
