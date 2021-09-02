<?php

include_once 'db.php';

class entregaPae extends db{

    private $idEstudiante;
    private $idEntrega;
    private $programaAlimentario;
    private $fecha;
    
    public function setIdEstudiante($idEstudiante){
        $this->idEstudiante = $idEstudiante;
    }
    
    public function setIdEntrega(){
        date_default_timezone_set('America/Bogota');
        $this->idEntrega = $this->idEstudiante . "-" . date("Y-m-d-H-i-s");
    }
    
    public function setProgramaAlimentario($programaAlimentario){
        $this->programaAlimentario = $programaAlimentario;
    }
    
    public function setFecha(){
        date_default_timezone_set('America/Bogota');
        $this->fecha = date("Y-m-d H:i:s");
    }

    public function añadirEntrega(){
        $query = $this->connect()->prepare("INSERT INTO entregaPae
                                            (idEntrega, idEstudiante, programaAlimentarioEstudiante,fecha)
                                            VALUES (:idEntrega, :idEstudiante, :programaAlimentario, :fecha)");
                        
        $query->execute(array(':idEntrega' => $this->idEntrega, ':idEstudiante' => $this->idEstudiante,
                              ':programaAlimentario' => $this->programaAlimentario, ':fecha' => $this->fecha));
    }

}

?>