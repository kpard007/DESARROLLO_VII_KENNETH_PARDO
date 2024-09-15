<?php

require_once 'Empleado.php';
class Desarrollador extends Empleado implements Evaluable{

    private $lenguajePrincipal;
    private $nivelExperiencia;

    public function __construct ($Nombre, $ID_Empleado, $Salario_base, $lenguajePrincipal, $nivelExperiencia){
        parent ::__construct ($Nombre, $ID_Empleado, $Salario_base);

        $this -> lenguajePrincipal = $lenguajePrincipal;
        $this -> nivelExperiencia = $nivelExperiencia;

    }

    public function Evaluar_Desempenio(){
        return "Evaluacion de desempeño de desarrollador {$this -> getNombre()}: muy bueno";
        
    }
    public function getLenguajePrincipal(){
        return $this -> lenguajePrincipal;
    }
    public function setLenguajePrincipal($lenguajePrincipal){
        $this -> lenguajePrincipal = $lenguajePrincipal;
    }

    public function getNivelExperiencia(){
        return $this ->nivelExperiencia; 
    }
    public function setNivelExperiencia($nivelExperiencia){
        $this -> nivelExperiencia = $nivelExperiencia;
    }

}





?>