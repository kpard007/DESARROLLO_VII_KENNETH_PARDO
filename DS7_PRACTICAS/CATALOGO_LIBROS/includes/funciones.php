<?php


function obtener_libros(){

    return [
        [
            'titulo' => 'Fortnite',
            'compañia' => 'Epic games',
            'anio_publicacion' => 2018,
            'genero' => 'battle royale',
            'descripcion' => 'Un entretenido juego donde te enfrentas a otros jugadores !Sé el ultimo en morir!'
        ],

        [
            'titulo' => 'Uncharted',
            'compañia' => 'Naughty dog',
            'anio_publicacion'=> 2016,
            'genero' => 'accion, aventura',
            'descripcion' => 'Acompaña a nathan drake en su aventura en descubrir grandes tesoros ocultos'
        ]

        ];


}

function mostrarDetallesLibro($libro){
        return "<div class = 'libro'>
        <h2>Compañia: </h2> <h4> {$libro['compañia']}</h4>
        <h2>Año de publicacion: </h2> <h4> {$libro['anio_publicacion']}</h4>
        <h2>Genero: </h2> <h4> {$libro['genero']}</h4>
        <h2>Descripcion: </h2> <h4> {$libro['descripcion']}</h4>
        </div>";


}
    


?>