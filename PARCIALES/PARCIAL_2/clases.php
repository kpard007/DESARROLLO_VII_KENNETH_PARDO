<?php

interface Detalles{
    public function obtenerDetallesEspecificos(): string;

}


class EntradaUnaColumna extends Entrada{
    public $titulo; 
    public $descripcion;



    public function obtenerDetallesEspecificos(): string{

        $archivo = 'tareas.json';

        function leerTitulo ($archivo){
            $contenido = file_get_contents($archivo);
            return json_decode($contenido, true);
        }
        $tituloobtener = leerTitulo($archivo);

        return "Entrada de una columna"; 
    } 

}

class EntradaDosColumna extends Entrada{
    public $titulo1;
    public $descripcion1;
    public $titulo2;
    public $descripcion2;
    
    public function obtenerDetallesEspecificos(): string{
        return "Entrada de dos columnas ";
    }

}

class EntradaTresColumna extends Entrada{
    public $titulo1;
    public $descripcion1; 
    public $titulo2;
    public $titulo3;
    public $descripcion3;

    public function obtenerDetallesEspecificos(): string{
        return "Entrada de tres columnas";
    }

}

abstract class Entrada implements Detalles{
    public $id;
    public $fecha_creacion;
    public $tipo;
    public $titulo;
    public $descripcion;

    public function __construct($datos = []) {
        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}

class GestorBlog {
    private $entradas = [];

    public function cargarEntradas() {
        if (file_exists('tareas.json')) {
            $json = file_get_contents('tareas.json');
            $data = json_decode($json, true);
            foreach ($data as $entradaData) {
                $this->entradas[] = new Entrada($entradaData);
            }
        }
    }

    public function guardarEntradas() {
        $data = array_map(function($entrada) {
            return get_object_vars($entrada);
        }, $this->entradas);
        file_put_contents('tareas.json', json_encode($data, JSON_PRETTY_PRINT));
    }

    public function obtenerEntradas() {
        return $this->entradas;
    }


    public function agregarEntrada(Entrada $entrada) {
        $this->entradas[] = $entrada;
    }

    public function editarEntrada(Entrada $entrada) {
        foreach ($this->entradas as $index => $e) {
            if ($e->id === $entrada->id) {
                $this->entradas[$index] = $entrada;
                return true;
            }
        }
        return false;
    }

    public function eliminarEntrada($id) {
        foreach ($this->entradas as $index => $entrada) {
            if ($entrada->id == $id) {
                unset($this->entradas[$index]);
                $this->entradas = array_values($this->entradas); 
                return true;
            }
        }
        return false;
    }

    public function obtenerEntrada($id) {
        foreach ($this->entradas as $entrada) {
            if ($entrada->id == $id) {
                return $entrada;
            }
        }
        return null;
    }
}       
