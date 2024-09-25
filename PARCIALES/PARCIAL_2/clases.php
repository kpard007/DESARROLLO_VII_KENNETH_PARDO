<?php
// Archivo: clases.php

class Tarea
{
    public $id;
    public $titulo;
    public $descripcion;
    public $estado;
    public $prioridad;
    public $fechaCreacion;
    public $tipo;

    public function __construct($datos)
    {
        foreach ($datos as $key => $value) {
            $this->$key = $value;
        }
    }

    // Implementar estos getters

    public function getEstado()
    {
        return  $this->estado;
    }
    public function getPrioridad()
    {
        return $this->prioridad;
    }
    // public function getEstado() { }
    // public function getPrioridad() { }
    public function getID_tarea($id){
        return $this-> $id;
    }
 
    public function getTitulo_tarea($titulo){
        return $this ->$titulo;
    }
 
    public function getDescrip_tarea($descripcion){
        return $this-> $descripcion;
    }
 
    public function getEstado_tarea($estado){
        return $this->$estado;
    }
 
    public function getPrioridad_tarea($prioridad){
        return $this-> $prioridad;
    }
 
    public function getFechaCreacion_tarea($fechaCreacion){
        return $this-> $fechaCreacion;
    }
 
    public function getTipo_tarea($tipo){
        return $this-> $tipo;

    }
}

class GestorTareas
{
    private $tareas = [];

    public function cargarTareas()
    {
        $json = file_get_contents('tareas.json');
        $data = json_decode($json, true);
        foreach ($data as $tareaData) {
            $tarea = new Tarea($tareaData);
            $this->tareas[] = $tarea;
        }

        return $this->tareas;
    }
    public function agregarTarea($tarea)
    {
        array_push($this->tareas, $tarea);
    }
    public function  eliminarTarea($id)
    {
        unset($this->tareas[$id - 1]);
    }
    public function actualizarTarea($tarea) {}
    public function actualizarEstadoTarea($id, $nuevoEstado)
    {
        foreach ($this->tareas as $key => $tarea) {
            if ($nuevoEstado === $tarea['estado']) {
                $this->tareas[$key] = $nuevoEstado;
            }
        }
        return $this->tareas;
    }
    public function buscarTareasPorEstado($estado) {}
    public function listarTareas($filtroEstado = '')
    {
        $array_return = array();
        foreach ($this->tareas as $tarea) {
            if ($filtroEstado === $tarea['estado']) {
                array_push($array_return, $tarea);
            }
        }
        return $array_return;
    }
}

// Implementar:
// 1. La interfaz Detalle

interface Detalle {
    public function obtenerDetallesEspecificos(): string;
}

// 2. Modificar la clase Tarea para implementar la interfaz Detalle

// 3. Las clases TareaDesarrollo, TareaDiseno y TareaTesting que hereden de Tarea

class TareaDesarrollos extends Tarea implements Detalle {
    private $lenguajeProgramacion;

    public function __construct($lenguajeProgramacion) {
        $this->lenguajeProgramacion = $lenguajeProgramacion;
    }

    public function obtenerDetallesEspecificos(): string {
        return "leguaje de programacion es: $this->lenguajeProgramacion";
    }
}

class TareaDiseno extends Tarea implements Detalle {
    private $herramientaDiseno;

    public function __construct($herramientaDiseno) {
        $this->herramientaDiseno = $herramientaDiseno;
    }


    public function obtenerDetallesEspecificos(): string {
        return "herramienta de diseno es: $this->herramientaDiseno";
    }
}

class TareaTesting extends Tarea implements Detalle {
    private $tipoTest;

    public function __construct($tipoTest) {
        if (in_array($tipoTest, ['unitario', 'integracion', 'e2e'])) {
            $this->tipoTest = $tipoTest;
        } else {
            throw new InvalidArgumentException("no es valido el tipo de test");
        }
    }

    public function obtenerDetallesEspecificos(): string {
        return "tipo de test: $this->tipoTest";
    }

}

?>
            
            
            