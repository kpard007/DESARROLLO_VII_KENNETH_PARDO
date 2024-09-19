# Sistema de Gestión de Estudiantes

Este sistema de gestión de estudiantes permite gestionar la información de los estudiantes, calcular sus promedios y asignarles un estado académico basado en sus calificaciones. 

# Descripción

El sistema consta de una clase `Estudiante` que permite:
- Agregar materias con calificaciones.
- Calcular el promedio de calificaciones.
- Asignar un estado académico basado en el promedio (Honor Roll, Normal, En Riesgo Académico).
- Obtener detalles del estudiante, incluyendo ID, nombre, edad, carrera, promedio y estado académico.

# Estructura del Proyecto

- **Estudiante.php**: Define la clase `Estudiante` con métodos para agregar materias, calcular el promedio, asignar estado académico y obtener detalles del estudiante.


# Métodos de la Clase `Estudiante`

- `__construct(int $id, string $nombre, int $edad, string $carrera)`: Constructor para inicializar un nuevo estudiante.
- `agregarMateria(string $materia, float $calificacion)`: Agrega una materia y su calificación.
- `obtenerPromedio(): float`: Calcula y retorna el promedio de las calificaciones.
- `asignarFlag()`: Asigna el estado académico basado en el promedio.
- `obtenerDetalles(): array`: Retorna un array con los detalles del estudiante.
