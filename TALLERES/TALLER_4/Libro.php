
<?php
 require_once 'Prestable.php';

class Libro {
   
    public $titulo;
    public $autor;
    public $anioPublicacion;

    public function __construct($titulo, $autor, $anioPublicacion) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anioPublicacion = $anioPublicacion;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = trim($titulo);
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = trim($autor);
    }

    public function getAnioPublicacion() {
        return $this->anioPublicacion;
    }

    public function setAnioPublicacion($anio) {
        $this->anioPublicacion = intval($anio);
    }

    public function obtenerInformacion() {
        return "'{$this->titulo}' por {$this->autor}, publicado en {$this->anioPublicacion}";
    }


    //funciones para prestable
    private $disponible = true;

    public function prestar() {
        if ($this->disponible) {
            $this->disponible = false;
            return true;
        }
        return false;
    }

    public function devolver() {
        $this->disponible = true;
    }

    public function estaDisponible() {
        return $this->disponible;
    }
}

// Ejemplo de uso
$libro = new Libro("Rayuela", "Julio Cortázar",1963);
echo $libro -> obtenerInformacion();
echo "<br> Disponible:" . ($libro ->estaDisponible() ? "Si" : "No");
$libro -> prestar();
echo "<br> Disponible despúes de prestar: " . ($libro -> estaDisponible() ? "Sí" : "No");
$libro -> devolver();
echo "<br> Disponible despúes de devolver " . ($libro -> estaDisponible() ? "Sí" : "No");
?>



