<?php
include_once 'db.php';

class programaAlimentario extends db{
    private $nombreProgramaAlimentario;

    public function setNombreProgramaAlimentario($nombreProgramaAlimentario){
        $this->nombreProgramaAlimentario = $nombreProgramaAlimentario;
    }

    public function getNombreProgramaAlimentario(){
        return $this->nombreProgramaAlimentario;
    }

    public function añadirProgramaAlimentario(){
        $query = $this->connect()->prepare("INSERT INTO programasAlimentarios (nombreProgramaAlimentario) VALUES (:programaAlimentario)");
        $query->execute(array(':programaAlimentario' => $this->nombreProgramaAlimentario));
    }

    public function editarProgramaAlimentario($programaAlimentarioOriginal){
        $query = $this->connect()->prepare("UPDATE programasAlimentarios
                                            SET nombreProgramaAlimentario = :programaAlimentario
                                            WHERE nombreProgramaAlimentario = :programaAlimentarioOriginal");

        $query->execute(array(':programaAlimentario' => $this->nombreProgramaAlimentario,
        ':programaAlimentarioOriginal' => $programaAlimentarioOriginal));
    }

    public function eliminarProgramaAlimentario(){
        $query = $this->connect()->prepare("DELETE FROM programasAlimentarios
                                            WHERE nombreProgramaAlimentario = :programaAlimentario");

        $query->execute(array(':programaAlimentario' => $this->nombreProgramaAlimentario));
    }
}
?>