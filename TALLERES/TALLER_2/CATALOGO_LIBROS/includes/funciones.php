<?php

function obtenerLibros() {
    return [
        [
            'titulo' => 'El Quijote',
            'autor' => 'Miguel de Cervantes',
            'anio_publicacion' => 1605,
            'genero' => 'Novela',
            'descripcion' => 'La historia del ingenioso hidalgo Don Quijote de la Mancha.'
        ],
        [
            'titulo' => 'Cien años de soledad',
            'autor' => 'Gabriel García Márquez',
            'anio_publicacion' => 1967,
            'genero' => 'Realismo mágico',
            'descripcion' => 'La historia de la familia Buendía en el pueblo ficticio de Macondo.'
        ],
        [
            'titulo' => '1984',
            'autor' => 'George Orwell',
            'anio_publicacion' => 1949,
            'genero' => 'Distopía',
            'descripcion' => 'Una novela que presenta un futuro totalitario y opresivo.'
        ],
        [
            'titulo' => 'Orgullo y prejuicio',
            'autor' => 'Jane Austen',
            'anio_publicacion' => 1813,
            'genero' => 'Romántica',
            'descripcion' => 'Una novela sobre el amor y las relaciones en la Inglaterra del siglo XIX.'
        ],
        [
            'titulo' => 'El gran Gatsby',
            'autor' => 'F. Scott Fitzgerald',
            'anio_publicacion' => 1925,
            'genero' => 'Novela',
            'descripcion' => 'La historia del misterioso millonario Jay Gatsby y su amor por Daisy Buchanan.'
        ]
    ];
}

// funcion para mostrar los detalles de un libro
function mostrarDetallesLibro($libro) {
    return "<div class='libro'>
                <h2>{$libro['titulo']}</h2>
                <p><h3>Autor:</h3> {$libro['autor']}</p>
                <p><h3>Año de Publicación:</h3> {$libro['anio_publicacion']}</p>
                <p><h3>Género:</h3> {$libro['genero']}</p>
                <p><h3>Descripción:</h3> {$libro['descripcion']}</p>
            </div>";
}
?>
