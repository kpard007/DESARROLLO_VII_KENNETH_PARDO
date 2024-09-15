<!DOCTYPE html>
<html lang="es">

<head>
    <title>Gestión de empleados</title>
    <style>
       

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1{
            text-align: center;
            color: white;
            padding: 10px;
            margin: 10px 0; 
            background: black;
    
        }

        h2 {
            text-align: center;
            color: white;
            background-color: black;
            padding: 10px;
            margin: 10px 0;
        }

        
        table {
            width: 100%;
            /*border-collapse: collapse;*/
            margin: 20px auto;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr {
            background-color: #f2f2f2;
        }

        .resumen {
            margin: 20px auto;
            width: 80%;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0);
            text-align: center;
        }
    </style>
</head>

<body>

<?php
require_once 'Empleado.php';
require_once 'Gerente.php';
require_once 'Desarrollador.php';
require_once 'Empresa.php';

$Empresa = new Empresa();
$Gerente = new Gerente("Carlos", 1, 1550, "Java");
$Desarrollador = new Desarrollador("Andres", 2, 3000, "PHP", "Senior");

$Empresa->Agregar_empleados($Gerente);
$Empresa->Agregar_empleados($Desarrollador);

echo "<h1>Listado de empleados</h1>";

// Tabla para el listado de empleados
echo "<table>";
echo "<tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th></tr>";

foreach ($Empresa->Obtener_Empleados() as $empleado) {
    echo "<tr>";
    echo "<td>" . $empleado->getID_Emp() . "</td>";
    echo "<td>" . $empleado->getNombre() . "</td>";
    echo "<td>" . get_class($empleado) . "</td>";
    echo "<td>$" . $empleado->getSalario() . "</td>";
    echo "</tr>";
}
echo "</table>";

// Sección de nómina y evaluaciones
echo "<div class='resumen'>";
echo "<h2>Nómina total</h2>";
echo "Total: $" . $Empresa->Calcular_NominaTot();
echo "<br><br>";
echo "<h2>Evaluación de desempeño</h2>";
$Empresa->Evaluar_Desempenio();
echo "</div>";
?>

</body>
</html>
