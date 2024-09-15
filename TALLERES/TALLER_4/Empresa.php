
<?php
require_once 'Gerente.php';
require_once 'Desarrollador.php';
require_once 'Empleado.php';
require_once 'Evaluable.php';

class Empresa {

    private $Empleados = [];

    public function Agregar_empleados(Empleado $Empleado){
        $this -> Empleados[] = $Empleado;

    }


    public function Listar_Empleados(){
        foreach ($this -> Empleados as $Empleado){
            echo "Nombre: ". $Empleado -> getNombre()."<br>";
            echo "ID: ". $Empleado -> getID_Emp()."<br>";
            echo "Salario base: ". $Empleado -> getSalario()."$<br><br>"; 
        }
    }

    public function Obtener_Empleados() {
        return $this->Empleados;
    }


    public function Calcular_NominaTot(){
        $total = 0;
        foreach ($this -> Empleados as $Empleado){
            $total = $total + $Empleado -> getSalario();
        }
        return $total;
    }

    public function Evaluar_Desempenio(){

        foreach ($this -> Empleados as $Empleado){

            if ($Empleado instanceof Evaluable){
                echo $Empleado -> Evaluar_Desempenio(). "<br>";
            }else {
                echo "Empleado {$Empleado -> getNombre()}: No es evaluable.<br>";
            }
        }
    }
}

?>
