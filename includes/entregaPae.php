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
        $this->idEntrega = $this->idEstudiante . "-" . date("Y-m-d");
    }

    public function setProgramaAlimentario($programaAlimentario){
        $this->programaAlimentario = $programaAlimentario;
    }

    public function setFecha(){
        $this->fecha = date("Y-m-d");
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