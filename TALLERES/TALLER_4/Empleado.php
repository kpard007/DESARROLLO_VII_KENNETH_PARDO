<?php

class Empleado{
    public $Nombre;
    public $ID_Empleado;
    public $Salario_base;


    public function __construct ($Nombre, $ID_Empleado, $Salario_base){
        $this->Nombre = $Nombre;
        $this->ID_Empleado = $ID_Empleado;
        $this->Salario_base = $Salario_base;

    }
    public function getNombre(){
       return  $this -> Nombre;
    }

    public function setNombre($Nombre){
        return $this -> $Nombre;
    }

    public function getID_Emp(){
        return  $this -> ID_Empleado;
     }
 
     public function setID_Emp($ID_Empleado){
         return $this -> $ID_Empleado;
     }

     public function getSalario(){
        return  $this -> Salario_base;
     }
 
     public function setSalario($Salario_base){
         return $this -> $Salario_base;
     }
    
     public function obtenerEmpleado() {
        return "{$this->Nombre} por {$this->ID_Empleado}, publicado en {$this->Salario_base}";
    } 


}




?>