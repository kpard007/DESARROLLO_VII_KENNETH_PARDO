
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integración de PHP con HTML</title>


    <style>

        body { 
        font-family: 
        Times new roman;  
        line-height: 1.6; 
        padding: 20px; 
        
        }
        .destacado { 
        color: red; 
        font-weight: bold; 
        }
        table { 
        border-collapse: collapse; 
        width: 100%; 
        }
        th, td { 
        border: 1px solid #ddd; 
        padding: 8px; text-align: left; 
        }

        th { 
        background-color: #f2f2f2; 
        }

    </style>
</head>
<body>
    <h1>Integración de PHP con HTML</h1>
    
    <?php
    $nombre = "Ken";
    $edad = 17;
    $habilidades = ["PHP", "HTML", "CSS", "JavaScript"];
    ?>

    <h2>Información Personal</h2>
    <p>Nombre: <span class="destacado"><?php echo $nombre; ?></span></p>
    <p>Edad: <?= $edad ?> años</p>

    <h2>Habilidades</h2>
    <ul>
        <?php foreach ($habilidades as $habilidad): ?>
            <li><?= $habilidad ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Tabla de Multiplicar</h2>
    <table>
        <tr>
            <th>Número</th>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <th><?= $i ?></th>
            <?php endfor; ?>
        </tr>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <tr>
                <th><?= $i ?></th>
                <?php for ($j = 1; $j <= 5; $j++): ?>
                    <td><?= $i * $j ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

    <h2>Contenido Condicional</h2>
    <?php if ($edad >= 18): ?>
        <p>Eres mayor de edad.</p>
    <?php else: ?>
        <p>Eres menor de edad.</p>
    <?php endif; ?>

    <h2>Fecha y Hora Actual</h2>
    <p>La fecha y hora actual es: <?= date('Y-m-d H:i:s') ?></p>


    <?php

    //creacion de etiqueta con mi nombre
function crearTarjeta($nombre, $descripcion) {
    echo "
    <div class='tarjeta'>
        <h2>$nombre</h2>
        <p>$descripcion</p>
    </div>
    <style>
        .tarjeta {
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            background-color: #f9f9f9;
            margin: 20px auto;
            text-align: center;
        }
        .tarjeta h2 {
            color: green;
            font-size: 24px;
            margin-bottom: 8px;
        }
        .tarjeta p {
            color: #666;
            font-size: 16px;
            color: green; 
        }
    </style>
    ";
    
}
?>
<?php
crearTarjeta("Kenneth Pardo", "Desarrollador Web");
?>


</body>
</html>
    
							
