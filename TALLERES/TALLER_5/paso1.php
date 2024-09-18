<?php
// 1. Crear un arreglo de 10 nombres de ciudades
$ciudades = ["Nueva York", "Tokio", "Londres", "París", "Sídney", "Río de Janeiro", "Moscú", "Berlín", "Ciudad del Cabo", "Toronto"];

// 2. Imprimir el arreglo original
echo "Ciudades originales:\n";
print_r($ciudades);

// 3. Agregar 2 ciudades más al final del arreglo
array_push($ciudades, "Dubái", "Singapur");

// 4. Eliminar la tercera ciudad del arreglo
array_splice($ciudades, 2, 1);

// 5. Insertar una nueva ciudad en la quinta posición
array_splice($ciudades, 4, 0, "Mumbai");

// 6. Imprimir el arreglo modificado
echo "\nCiudades modificadas:\n";
print_r($ciudades);

// 7. Crear una función que imprima las ciudades en orden alfabético
function imprimirCiudadesOrdenadas($arr) {
    $ordenado = $arr;
    sort($ordenado);
    echo "Ciudades en orden alfabético:\n";
    foreach ($ordenado as $ciudad) {
        echo "- $ciudad\n";
    }
}

// 8. Llamar a la función
imprimirCiudadesOrdenadas($ciudades);


// TAREA: Crea una función que cuente y retorne el número de ciudades que comienzan con una letra específica
// Ejemplo de uso: contarCiudadesPorInicial($ciudades, 'S') debería retornar 1 (Singapur)
// Tu código aquí
echo "<br><br>";


function contarCiudadesPorInicial($ciudades, $letra){
        $cont = 0; 

        //convertimos la letra 'S' a minuscula para que no genere conflictio
        $letra = strtolower($letra);
        
        //recorremos el array para ver cuantas ciudades empiezan por la letra S
        foreach ($ciudades as $ciudad){
            
            if (strlen ($ciudad > 0)){

                $primeraLetra = strtolower ($ciudad [0]);

                if ($primeraLetra === $letra){
                    $cont ++;
    
                }
            }
            
        }
      
        
        return $cont;
}

$letra = 'S';
$cantidad = contarCiudadesPorInicial($ciudades, $letra);
echo "El numero de ciudades que empiezan por la letra 'S' son: $cantidad";

?>