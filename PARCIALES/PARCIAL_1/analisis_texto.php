<?php
include 'utilidades_texto.php';

$frases = ["Hola como estás", "Excelente! dame tu número", "¡No puede ser! espero este bien."];
?>

<!DOCTYPE html>
<head>

    <title>Análisis de Texto</title>
</head>
<body>
    <h2>Análisis de Frases</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Frase</th>
                <th>Número de Palabras</th>
                <th>Número de Vocales</th>
                <th>Palabras Invertidas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($frases as $frase): ?>
                <tr>
                    <td><?= htmlspecialchars($frase) ?></td>
                    <td><?= contar_palabras($frase) ?></td>
                    <td><?= contar_vocales($frase) ?></td>
                    <td><?= htmlspecialchars(invertir_palabras($frase)) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
