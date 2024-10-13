<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro Avanzado</title>
</head>
<body>
    <h2>Formulario de Registro Avanzado</h2>
    <form action="procesar.php" method="POST" enctype="multipart/form-data">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>" required><br><br>


        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required><br><br>


        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : ''; ?>" required><br><br>


        <label for="sitio_web">Sitio Web:</label>
        <input type="url" id="sitio_web" name="sitio_web" value="<?php echo isset($_POST['sitio_web']) ? $_POST['sitio_web'] : ''; ?>"><br><br>

        <label for="genero">Género:</label>
        <select id="genero" name="genero">
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="otro">Otro</option>
        </select><br><br>

        <label>Intereses:</label><br>
        <input type="checkbox" id="deportes" name="intereses[]" value="deportes">
        <label for="deportes">Deportes</label><br>
        <input type="checkbox" id="musica" name="intereses[]" value="musica">
        <label for="musica">Música</label><br>
        <input type="checkbox" id="lectura" name="intereses[]" value="lectura">
        <label for="lectura">Lectura</label><br><br>

        <label for="comentarios">Comentarios:</label><br>
        <textarea id="comentarios" name="comentarios" rows="4" cols="50"></textarea><br><br>

        <label for="foto_perfil">Foto de Perfil:</label>
        <input type="file" id="foto_perfil" name="foto_perfil"><br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">
        <a href='resumen.php'>Resumen</a>
    </form>
</body>
</html>