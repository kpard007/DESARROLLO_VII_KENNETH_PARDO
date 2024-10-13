<?php
$archivoJson = 'registros.json';
$registros = [];

// Cargar registros desde el archivo JSON
if (file_exists($archivoJson)) {
    $registros = json_decode(file_get_contents($archivoJson), true);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>

    <title>Resumen de Registros</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: white;
        }
    </style>
</head>
<body>

<h2>Resumen de Registros</h2>

<?php if (empty($registros)): ?>
    <p>No hay registros procesados.</p>
<?php else: ?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha de Nacimiento</th>
            <th>Edad</th>
            <th>Sitio Web</th>
            <th>Género</th>
            <th>Intereses</th>
            <th>Comentarios</th>
            <th>Foto de Perfil</th>
        </tr>
        <?php foreach ($registros as $registro): ?>
            <tr>
                <td><?= htmlspecialchars($registro['nombre']) ?></td>
                <td><?= htmlspecialchars($registro['email']) ?></td>
                <td><?= htmlspecialchars($registro['fecha_nacimiento']) ?></td>
                <td><?= date_diff(date_create($registro['fecha_nacimiento']), date_create('now'))->y ?></td>
                <td><?= htmlspecialchars($registro['sitio_web']) ?></td>
                <td><?= htmlspecialchars($registro['genero']) ?></td>
                <td><?= htmlspecialchars(implode(", ", $registro['intereses'])) ?></td>
                <td><?= htmlspecialchars($registro['comentarios']) ?></td>
                <td>
                    <?php if (isset($registro['foto_perfil'])): ?>
                        <img src="<?= $registro['foto_perfil'] ?>" width="50">
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<br>
<a href="formulario.php">Volver al formulario</a>
</body>
</html>
