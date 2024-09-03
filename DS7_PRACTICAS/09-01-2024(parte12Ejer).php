<?php
$calificacion = 60;
$resultado = ($calificacion >= 61 && $calificacion <=100) ? "Aprobado": "Reprobado";

if (($calificacion >= 91) && ($calificacion <= 100)){

    $letra = "A";
}

else if(($calificacion >= 81) && ($calificacion <= 90)){
    $letra = "B";
}

else if(($calificacion >= 71) && ($calificacion <= 80)){
    $letra = "C";
}

 else if(($calificacion >= 61) && ($calificacion <= 70)){    
    $letra = "D";
}
else 
    $letra ="F";

echo "Tu calificacion es: $letra<br>";
echo "$resultado<br>";


switch ($letra){
    case "A":
        echo "Excelente desempeño";
        break;
    case "B":
        echo "Buen trabajo";
        break;
    case "C":
        echo "Trabajo aceptable";
        break;
    case "D":
        echo "Necesitas mejorar";
        break;
    case "F":
        echo "Debes esforzarte más";
    break;
}


?>