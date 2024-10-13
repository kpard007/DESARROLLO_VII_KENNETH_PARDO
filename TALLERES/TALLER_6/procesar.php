<?php
require_once 'validaciones.php';
require_once 'sanitizacion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errores = [];
    $datos = [];

    // Procesar y validar cada campo
    $campos = ['nombre', 'email', 'fecha_nacimiento', 'sitio_web', 'genero', 'intereses', 'comentarios'];
    foreach ($campos as $campo) {
        if (isset($_POST[$campo])) {
            $valor = $_POST[$campo];
            $valorSanitizado = call_user_func("sanitizar" . ucfirst(str_replace('_', '', $campo)), $valor);
            $datos[$campo] = $valorSanitizado;

            $nombreFuncionValidacion = "validar" . ucfirst(str_replace('_', '', $campo));
            if (!call_user_func($nombreFuncionValidacion, $valorSanitizado)) {
                $errores[] = "El campo $campo no es válido.";
            }
        }
    }

    // Procesar la foto de perfil
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] !== UPLOAD_ERR_NO_FILE) {
        if (!validarFotoPerfil($_FILES['foto_perfil'])) {
            $errores[] = "La foto de perfil no es válida.";
        } else {
            $rutaDestino = 'uploads/' . basename($_FILES['foto_perfil']['name']);
            if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $rutaDestino)) {
                $datos['foto_perfil'] = $rutaDestino;
            } else {
                $errores[] = "Hubo un error al subir la foto de perfil.";
            }
        }
    }

    if (isset($_POST['fecha_nacimiento'])) {
        $fechaNacimiento = $_POST['fecha_nacimiento'];
        // Sanitiza la fecha (si es necesario)
        $datos['fecha_nacimiento'] = $fechaNacimiento;
        
        // Validar la fecha de nacimiento
        if (validarFechaNacimiento($fechaNacimiento)) {
            // Calcular la edad
            $edad = date_diff(date_create($fechaNacimiento), date_create('now'))->y;
            $datos['edad'] = $edad; // Agrega la edad a los datos
        } else {
            $errores[] = "La fecha de nacimiento no es válida o el usuario no tiene al menos 18 años.";
        }
    }
    

    // Mostrar resultados o errores
    if (empty($errores)) {
    // Guardar el registro en el archivo JSON
        $archivo = 'registros.json';
        $registros = [];

        if (file_exists($archivo)) {
            $contenido = file_get_contents($archivo);
            $registros = json_decode($contenido, true) ?? [];
        }

        $registros[] = $datos;
        file_put_contents($archivo, json_encode($registros, JSON_PRETTY_PRINT));

        echo "<h2>Datos Recibidos:</h2>";
        foreach ($datos as $campo => $valor) {
            if ($campo === 'intereses') {
                echo "$campo: " . implode(", ", $valor) . "<br>";
            } elseif ($campo === 'foto_perfil') {
                echo "$campo: <img src='$valor' width='100'><br>";
            } else {
                echo "$campo: $valor<br>";
            }
        }
    } else {
        echo "<h2>Errores:</h2>";
        foreach ($errores as $error) {
            echo "$error<br>";
        }

    }
    echo "<br><a href='formulario.php'>Volver al formulario</a>";
} else {
    echo "Acceso no permitido.";
}      
?>