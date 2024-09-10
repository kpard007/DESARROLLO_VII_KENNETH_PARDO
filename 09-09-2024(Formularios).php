
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

<style>

    body {
       
        font-family: 'Times New Roman', Times, serif;
        display: flex;
        align-items: center;
        background-color: #f4f4f4;
        justify-content: center;
        margin: 0; 
        height: 100vh;
    }
    .Formulario {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        width: 300px;
        max-width: 90%;

    }
    
    .tituloinfo {
        text-align: center;
        color: #333; 
        margin-bottom: 20px;

    }
    form{
        display: flex;
        flex-direction:column;
    }
    label {
        margin-bottom: 8px;
    }

    input [type = "text"],
    input [type = "email"],

    textarea{
       margin-bottom: 10px;
       border: 1px solid blueviolet;
       padding: 10px;
       border-radius: 5px;
    
    }
    input [type = "submit"]{
        color: white;
        font-size: 16px;
        padding:10px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50;
    }
    input [type = "submit"]:hover{
       background-color: #45a049;
    }




</style>
    <title>Ejemplo de Formulario</title>
</head>
<body>
    <div class = "Formulario">

        <div class = "tituloinfo">
            <h2> Formaulario con info<h2>
        </div>

    <form action="09-09-2024(FormulariosPro).php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" required></textarea>
        
        <input type="submit" value="Enviar">
    </form>
    </div>
</body>
</html>
