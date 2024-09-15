
<?php
require_once 'Evaluable.php';

class Gerente extends Empleado implements Evaluable{

    private $Departamento; 

    public function __construct($Nombre, $ID_Empleado, $Salario_base, $Departamento){
        parent::__construct($Nombre, $ID_Empleado, $Salario_base);
        $this->Departamento = $Departamento;
    }

    public function Evaluar_Desempenio(){
        return "Evaluacion de desempeño de gerente {$this -> getNombre()}: excelente";
    }

    public function getDepartamento(){
        return $this -> Departamento;
    }

    public function setDepartamento ($Departamento){
        $this -> Departamento = $Departamento; 
    }


    public function Asignar_bono($bono){
        return $this -> setSalario($this -> getSalario() + $bono); 
    }

}

?>