
<?php
require_once 'Libro.php';
require_once 'LibroDigital.php';

class Biblioteca {
    private $libros = [];

    public function agregarLibro(Prestable $libro) {
        $this->libros[] = $libro;
    }

    public function listarLibros() {
        foreach ($this->libros as $libro) {
            echo $libro->obtenerInformacion();
            echo "<br>Disponible: " . ($libro->estaDisponible() ? "Sí" : "No");
            echo "<br><br>";
        }
    }

    public function prestarLibro($titulo) {
        foreach ($this->libros as $libro) {
            if ($libro->getTitulo() === $titulo && $libro->estaDisponible()) {
                $libro->prestar();
                return true;
            }
        }
        return false;
    }

    public function devolverLibro($titulo) {
        foreach ($this->libros as $libro) {
            if ($libro->getTitulo() === $titulo && !$libro->estaDisponible()) {
                $libro->devolver();
                return true;
            }
        }
        return false;
    }
}

// Ejemplo de uso
$biblioteca = new Biblioteca();

$libro1 = new Libro("El principito", "Antoine de Saint-Exupéry", 1943);
$libro2 = new LibroDigital("Dune", "Frank Herbert", 1965, "EPUB", 3.2);

$biblioteca->agregarLibro($libro1);
$biblioteca->agregarLibro($libro2);

echo "<br>Listado inicial de libros:<br>";
$biblioteca->listarLibros();

echo "<br>Prestando 'El principito'...";
$biblioteca->prestarLibro("El principito");

echo "<br><br>Listado después de prestar:<br>";
$biblioteca->listarLibros();

echo "<br>Devolviendo 'El principito'...";
$biblioteca->devolverLibro("El principito");

echo "<br>Listado final:<br>";
$biblioteca->listarLibros();
?>

