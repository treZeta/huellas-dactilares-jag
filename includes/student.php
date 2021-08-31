<?php

    include_once 'db.php';

    class student extends db{
        private $nombres;
        private $apellidos;
        private $idEstudiante;
        private $idHuellas;
        private $nombreGrupo;
        private $programaAlimentario;
        private $genero;

        public function setNombres($nombres){
            $this->nombres = $nombres;
        }
        public function getNombres(){
            return $this->nombres;
        }

        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }
        public function getApellidos(){
            return $this->apellidos;
        }

        public function setIdEstudiante($idEstudiante){
            $this->idEstudiante = $idEstudiante;
        }
        
        public function getIdEstudiante(){
            return $this->idEstudiante;
        }

        public function setprogramaAlimentario($programaAlimentario){
            $this->programaAlimentario = $programaAlimentario;
        }

        public function getprogramaAlimentario(){
            return $this->programaAlimentario;
        }

        public function setGenero($genero){
            $this->genero = $genero;
        }

        public function getGenero(){
            return $this->genero;
        }

        public function setNombreGrupo($nombreGrupo){
            $this->nombreGrupo = $nombreGrupo;
        }

        public function getGrupo(){
            return $this->Idgrupo;
        }

        public function setIdHuellas($idHuellas){
            $this->idHuellas = $idHuellas;
        }

        public function getIdHuellas(){
            return $this->idHuellas;
        }
        

        

        public function addStudent(){
            $query = $this->connect()->prepare("INSERT INTO estudiantes
                                                (nombres, apellidos, idEstudiante, idHuellas, programaAlimentario, nombreGrupo, genero)
                                                VALUES (:nombres, :apellidos, :idEstudiante, :idHuellas, :programaAlimentario, :nombreGrupo, :genero)");

            $query->execute(array(':nombres' => $this->nombres, ':apellidos' => $this->apellidos, ':idEstudiante' => $this->idEstudiante,
            ':idHuellas' => $this->idHuellas, ':nombreGrupo' => $this->nombreGrupo , ':programaAlimentario' => $this->programaAlimentario, ':genero' => $this->genero));
        }

        public function deleteStudent(){
            $query = $this->connect()->prepare("DELETE FROM estudiantes WHERE idEstudiante = :idEstudiante");
            $query->execute(array(':idEstudiante' => $this->idEstudiante));
        }

        public function editStudent($idEstudianteOriginal){
            $query = $this->connect()->prepare('UPDATE estudiantes
                                                SET nombres = :nombres, apellidos = :apellidos,
                                                programaAlimentario = :programaAlimentario,
                                                idHuellas = :idHuellas, nombreGrupo = :nombreGrupo,
                                                idEstudiante = :idEstudiante, genero = :genero
                                                WHERE idEstudiante = :idEstudianteOriginal');
            
            $query->execute(array(':nombres' => $this->nombres, ':apellidos' => $this->apellidos,
                                  ':programaAlimentario' => $this->programaAlimentario, ':genero' => $this->genero ,
                                  ':idHuellas' => $this->idHuellas, ':nombreGrupo' => $this->nombreGrupo,
                                  ':idEstudiante' => $this->idEstudiante, ':idEstudianteOriginal' => $idEstudianteOriginal));
        }

    }

?>