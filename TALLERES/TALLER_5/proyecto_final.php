
<?php

class Estudiante {
    private int $id;
    private string $nombre;
    private int $edad;
    private string $carrera;
    private array $materias;
    private string $flag;

    public function __construct(int $id, string $nombre, int $edad, string $carrera) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->carrera = $carrera;
        $this->materias = [];
        $this->flag = '';
    }


    public function agregarMateria(string $materia, float $calificacion){
        $this->materias[$materia] = $calificacion;
    }

   
    public function obtenerPromedio(): float {
        if (count($this->materias) === 0) {
            return 0;
        }
        return array_sum($this->materias) / count($this->materias);
    }

   
    public function obtenerDetalles(){
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'edad' => $this->edad,
            'carrera' => $this->carrera,
            'materias' => $this->materias,
            'promedio' => $this->obtenerPromedio(),
            'flag' => $this->flag
        ];
    }


    public function __toString(){
        return "ID: {$this->id}, Nombre: {$this->nombre}, Edad: {$this->edad}, Carrera: {$this->carrera}, Promedio: {$this->obtenerPromedio()}, Flag: {$this->flag}";
    }

    public function asignarFlag() {
        $promedio = $this->obtenerPromedio();
       
        if ($promedio >= 90) {
            $this->flag = 'Honor Roll';
        } elseif ($promedio < 60) {
            $this->flag = 'En Riesgo Académico';
        } else {
            $this->flag = 'Normal';
        }
    }
}

class SistemaGestionEstudiantes {
    private array $estudiantes = [];
    private array $graduados = [];

    // Método para agregar estudiante
    public function agregarEstudiante(Estudiante $estudiante){
        $estudiante->asignarFlag();
        $this->estudiantes[$estudiante->obtenerDetalles()['id']] = $estudiante;
    }

    // Método para obtener estudiante por ID
    public function obtenerEstudiante(int $id): ?Estudiante {
        return $this->estudiantes[$id] ?? null;
    }

    // Método para listar estudiantes
    public function listarEstudiantes() {
        return $this->estudiantes;
    }

    // Método para calcular el promedio general de todos los estudiantes
    public function calcularPromedioGeneral(){
        $promedios = array_map(fn($est) => $est->obtenerPromedio(), $this->estudiantes);
        return count($promedios) > 0 ? array_sum($promedios) / count($promedios) : 0;
    }

    // Método para obtener estudiantes por carrera
    public function obtenerEstudiantesPorCarrera(string $carrera){
        return array_filter($this->estudiantes, fn($est) => $est->obtenerDetalles()['carrera'] === $carrera);
    }

    // Método para obtener el estudiante con mejor promedio
    public function obtenerMejorEstudiante(): ?Estudiante {
        return array_reduce($this->estudiantes, fn($mejor, $est) => 
            $mejor === null || $est->obtenerPromedio() > $mejor->obtenerPromedio() ? $est : $mejor, null);
    }

    // Método para graduar estudiante
    public function graduarEstudiante(int $id){
        if (isset($this->estudiantes[$id])) {
            $this->graduados[] = $this->estudiantes[$id];
            unset($this->estudiantes[$id]);
        }
    }

    // Método para generar el ranking
    public function generarRanking(){
        uasort($this->estudiantes, fn($a, $b) => $b->obtenerPromedio() <=> $a->obtenerPromedio());
        return $this->estudiantes;
    }

    // Método para generar un reporte de rendimiento por materia
    public function generarReporteRendimiento(){
        $materiasReporte = [];
        
        foreach ($this->estudiantes as $estudiante) {
            foreach ($estudiante->obtenerDetalles()['materias'] as $materia => $calificacion) {
                if (!isset($materiasReporte[$materia])) {
                    $materiasReporte[$materia] = [
                        'total' => 0,
                        'conteo' => 0,
                        'calificacion_maxima' => $calificacion,
                        'calificacion_minima' => $calificacion
                    ];
                }

                $materiasReporte[$materia]['total'] += $calificacion;
                $materiasReporte[$materia]['conteo']++;
                $materiasReporte[$materia]['calificacion_maxima'] = max($materiasReporte[$materia]['calificacion_maxima'], $calificacion);
                $materiasReporte[$materia]['calificacion_minima'] = min($materiasReporte[$materia]['calificacion_minima'], $calificacion);
            }
        }

        // Calcular promedios
        foreach ($materiasReporte as $materia => &$data) {
            $data['promedio'] = $data['total'] / $data['conteo'];
        }

        return $materiasReporte;
    }

   
// Método para generar estadísticas por carrera
public function generarEstadisticasPorCarrera(){
    $estadisticas = [];

    foreach ($this->estudiantes as $estudiante) {
        $carrera = $estudiante->obtenerDetalles()['carrera'];
        if (!isset($estadisticas[$carrera])) {
            $estadisticas[$carrera] = [
                'cantidad_estudiantes' => 0,
                'promedio_general' => 0,
                'mejor_estudiante' => null
            ];
        }

        $estadisticas[$carrera]['cantidad_estudiantes']++;
        $estadisticas[$carrera]['promedio_general'] += $estudiante->obtenerPromedio();


        if ($estadisticas[$carrera]['mejor_estudiante'] === null) {
            $estadisticas[$carrera]['mejor_estudiante'] = $estudiante;
        } else {
            if (is_object($estadisticas[$carrera]['mejor_estudiante']) &&
                $estudiante->obtenerPromedio() > $estadisticas[$carrera]['mejor_estudiante']->obtenerPromedio()) {
                $estadisticas[$carrera]['mejor_estudiante'] = $estudiante;
            }
        }
    }

    // Calcular promedio general por carrera
    foreach ($estadisticas as &$estadistica) {
        $estadistica['promedio_general'] /= $estadistica['cantidad_estudiantes'];
    }

    return $estadisticas;
}


}


$sistema = new SistemaGestionEstudiantes();

// Agregar estudiantes
$sistema->agregarEstudiante(new Estudiante(1, "Juan Pérez", 20, "Ingeniería"));
$sistema->agregarEstudiante(new Estudiante(2, "Ana Gómez", 21, "Medicina"));
$sistema->agregarEstudiante(new Estudiante(3, "Carlos Díaz", 22, "Derecho"));

// Materias a juan
$sistema->obtenerEstudiante(1)->agregarMateria("Matemáticas", 56);
$sistema->obtenerEstudiante(1)->agregarMateria("Física", 61);
$sistema->obtenerEstudiante(1)->agregarMateria("Ingenieria de la infomación", 62);
$sistema->obtenerEstudiante(1)->agregarMateria("Base de datos", 60);

// Asignar materias ana
$sistema->obtenerEstudiante(2)->agregarMateria("Fisiologia", 95);
$sistema->obtenerEstudiante(2)->agregarMateria("Radiologia", 75);
$sistema->obtenerEstudiante(2)->agregarMateria("Biología", 78);
$sistema->obtenerEstudiante(2)->agregarMateria("Neurocirugia", 88);

// Asignar materias a carlos
$sistema->obtenerEstudiante(3)->agregarMateria("Politica", 95);
$sistema->obtenerEstudiante(3)->agregarMateria("Derechos humanos", 91);
$sistema->obtenerEstudiante(3)->agregarMateria("Leyes jurídicas", 95);
$sistema->obtenerEstudiante(3)->agregarMateria("Ciencias sociales", 88);

?>
<!DOCTYPE html>
<head>
    <title>Sistema de Gestión de Estudiantes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }
        h2{
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .flag-honor {
            color: green;
            font-weight: bold;
        }

        .flag-risk {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Sistema de Gestión de Estudiantes</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Carrera</th>
        <th>Promedio</th>
        <th>Estado Academico</th>
    </tr>;
<?php
foreach ($sistema->listarEstudiantes() as $estudiante) {
    $detalles = $estudiante->obtenerDetalles();
    $flagClass = $detalles['flag'] === 'Honor Roll' ? 'flag-honor' :
                 ($detalles['flag'] === 'En Riesgo Académico' ? 'flag-risk' : 'flag-normal');
    echo "<tr>";
    echo "<td>{$detalles['id']}</td>";
    echo "<td>{$detalles['nombre']}</td>";
    echo "<td>{$detalles['edad']}</td>";
    echo "<td>{$detalles['carrera']}</td>";
    echo "<td>{$detalles['promedio']}</td>";
    echo "<td class='$flagClass'>{$detalles['flag']}</td>";
    echo "</tr>";
}

echo '</table>';

echo '<br><h2>Reporte de rendimiento por materia:</h2><br>';

$reporte = $sistema->generarReporteRendimiento();
echo '<table>
    <tr>
        <th>Materia</th>
        <th>Promedio</th>
        <th>Calificación Máxima</th>
        <th>Calificación Mínima</th>
    </tr>';

foreach ($reporte as $materia => $data) {
    echo "<tr>";
    echo "<td>{$materia}</td>";
    echo "<td>{$data['promedio']}</td>";
    echo "<td>{$data['calificacion_maxima']}</td>";
    echo "<td>{$data['calificacion_minima']}</td>";
    echo "</tr>";
}

echo '</table>';
echo '</body>
</html>';


