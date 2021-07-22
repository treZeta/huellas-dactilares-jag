<?php

    include_once 'db.php';

    class student extends db{
        private $nombres;
        private $apellidos;
        private $huella1;
        private $huella2;
        private $id;
        private $programaAlimentario;

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

        public function setID($id){
            $this->id = $id;
        }
        public function getID(){
            return $this->id;
        }

        public function setprogramaAlimentario($programaAlimentario){
            $this->programaAlimentario = $programaAlimentario;
        }

        public function getprogramaAlimentario(){
            return $this->programaAlimentario;
        }

        public function setHuella1($huella1){
            $this->huella1 = $huella1;
        }

        public function setHuella2($huella2){
            $this->huella2 = $huella2;
        }

        public function addStudent(){
            $query = $this->connect()->prepare("INSERT INTO estudiantes
                                                (nombres, apellidos, id, huella1, huella2, programaAlimentario, ultimoReclamo)
                                                VALUES (:nombres, :apellidos, :id, :huella1, :huella2, :programaAlimentario, '0000-00-00')");

            $query->execute(array(':nombres' => $this->nombres, ':apellidos' => $this->apellidos, ':id' => $this->id,
            ':huella1' => $this->huella1, ':huella2' => $this->huella2, ':programaAlimentario' => $this->programaAlimentario));
        }

        public function deleteStudent(){
            $query = $this->connect()->prepare("DELETE FROM estudiantes WHERE id = :id");
            $query->execute(array(':id' => $this->id));
        }

        public function editStudent($id_original){
            $query = $this->connect()->prepare('UPDATE estudiantes
                                                SET nombres = :nombres, apellidos = :apellidos,
                                                programaAlimentario = :programaAlimentario,
                                                huella1 = :huella1, huella2 = :huella2, id = :id
                                                WHERE id = :id_original');
            
            $query->execute(array(':nombres' => $this->nombres, ':apellidos' => $this->apellidos,
                                  ':programaAlimentario' => $this->programaAlimentario,
                                  ':huella1' => $this->huella1, ':huella2' => $this->huella2,
                                  ':id' => $this->id, ':id_original' => $id_original));
        }

    }

?>