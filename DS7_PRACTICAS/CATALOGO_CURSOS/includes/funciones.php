<?php

function obtenerCursos(){
    return [
        [
            'titulo' => 'Desarrollo Web Avanzado',
            'instructor' => 'Juan Pérez',
            'duracion' => 8,
            'inscritos' => 25,
            'descripcion' => 'Curso avanzado de desarrollo web que cubre temas como PHP, JavaScript, y frameworks modernos.'
        ],

        [
            'titulo' => 'Base de datos',
            'instructor' => 'Mailyn cherigo',
            'duracion' => 10,
            'inscritos' => 20,
            'descripcion' => 'Curso acerca de las estructuras que son utiles en la actualidad en el ambito de base de datos.'
        ],

        [
                'titulo' => 'Desarrollo Web Avanzado',
                'instructor' => 'Juan Pérez',
                'duracion' => 8,
                'inscritos' => 25,
                'descripcion' => 'Curso avanzado de desarrollo web que cubre temas como PHP, JavaScript, y frameworks modernos.'
        ],
        [
            'titulo' => 'Desarrollo Web Avanzado',
            'instructor' => 'Juan Pérez',
            'duracion' => 8,
            'inscritos' => 25,
            'descripcion' => 'Curso avanzado de desarrollo web que cubre temas como PHP, JavaScript, y frameworks modernos.'
        ],
        [
            'titulo' => 'Desarrollo Web Avanzado',
            'instructor' => 'Juan Pérez',
            'duracion' => 8,
            'inscritos' => 25,
            'descripcion' => 'Curso avanzado de desarrollo web que cubre temas como PHP, JavaScript, y frameworks modernos.'
        ]
        ];

}

function mostrarDetallesCurso($curso){
    return "<div class ='curso'>
    <h2>Titulo:</h2>      <h4>{$curso['titulo']}</h4>
    <h2>Instructor:</h2>  <h4>{$curso['instructor']}</h4>
    <h2>Duracion:</h2>    <h4>{$curso['duracion']}</h4>
    <h2>Inscritos:</h2>   <h4>{$curso['inscritos']}</h4>
    <h2>Descripcion:</h2> <h4>{$curso['descripcion']}</h4>
    </div>";

}






















?>

