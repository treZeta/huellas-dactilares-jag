<?php
include_once 'db.php';

class huellas extends db{

    private $idHuellas;
    private $huella1;
    private $huella2;

    public function setIdHuellas($idEstudiante){
        $this->idHuellas = "h-" . $idEstudiante;
    }

    public function getIdHuellas(){
        return $this->idHuellas;
    }

    public function setHuella1($huella1){
        $this->huella1 = $huella1;
    }
    
    public function setHuella2($huella2){
        $this->huella2 = $huella2;
    }

    public function añadirHuellas(){
        $query = $this->connect()->prepare('INSERT INTO huellas (idHuellas, huella1, huella2)
                                            VALUES (:idHuellas, :huella1, :huella2)');

        $query->execute(array('idHuellas' => $this->idHuellas, ':huella1' => $this->huella1,
        ':huella2' => $this->huella2));
    }

    public function eliminarHuellas(){
        $query = $this->connect()->prepare("DELETE FROM huellas WHERE idHuellas = :idHuellas");
        $query->execute(array(':idHuellas' => $this->idHuellas));
    }

}
