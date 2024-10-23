<!DOCTYPE html>
    <head>
        <title>Formulario de Registro Avanzado</title>
    </head>
<body>
    <h2>Formulario de Registro Avanzado</h2>
    <form action ="procesar.php" method= "POST" enctype="multipart/form-data">
        
        <label for="nombre"> Nombre:</label>
        <input type = "text" id ="nombre" name "nombre" required ><br><br>

        <label for = "email"> Email: </label>
        <input type = "text" id = "email" name "email" required><br><br>

        <label for = "edad"> Edad: </label>
        <input type = "number" id = "edad" name "edad" required><br><br>

        <label for = "edad"> Sitio Web: </label>
        <input type = "url" id = "Sitio Web" name "Sitio_Web"><br><br>

        <label for ="genero"> Genero: </label>
        <select id= "genero" name = "genero"> 

            <option value="masculino"> Masculino </option>
            <option value="masculino"> Femenino </option>
            <option value="masculino"> Otro </option>
        </select><br><br>

        <label> Intereses: </label><br>
        <input type = "checkbox" id = "deportes" name= "intereses[]" value = "deportes">
        <label for = "deportes"> Deportes</label><br>
        
        <input type = "checkbox" id = "musica" name= "intereses[]" value = "musica">
        <label for = "musica"> Música</label><br>  

        <input type = "checkbox" id = "lectura" name= "intereses[]" value = "lectura">
        <label for = "lectura"> Lectura</label><br><br>

        <label for ="comentarios">Comentarios</label><br>
        <textarea id = "comentarios" name= "comentarios" rows="4" cols = "50"></textarea><br><br>

        <label for ="foto_perfil">foto de perfil:</label>
        <input type ="file" id= "foto_perfil" name = "foto_perfil"><br><br>

        <input type= "submit" value="Enviar">
        <input type= "reset" value="Limpiar">
    </form>
</body>
</html>