
<?php
// Ejemplo de uso de str_replace()
$frase = "El perro salio al parque y paseo por 3 horas";
$fraseModificada = str_replace("negro", "blanco", $frase);

echo "Frase original: $frase
";
echo "Frase modificada: $fraseModificada
";

// Ejercicio: Crea una variable con una frase que contenga al menos tres veces la palabra "PHP"
// y usa str_replace() para cambiar "PHP" por "JavaScript"
$miFrase = "hola como estas"; // Reemplaza esto con tu frase
$miFraseModificada = str_replace("PHP", "JavaScript", $miFrase);

echo "
Mi frase original: $miFrase
";
echo "Mi frase modificada: $miFraseModificada
";

// Bonus: Usa str_replace() para reemplazar múltiples palabras a la vez
$texto = "Pera y Mango son frutas. Me gusta la Pera y el Mango.";
$buscar = ["Pera", "Mango"];
$reemplazar = ["Manzana", "uvas"];
$textoModificado = str_replace($buscar, $reemplazar, $texto);

echo "
Texto original: $texto
";
echo "Texto modificado: $textoModificado
";
?>
          
