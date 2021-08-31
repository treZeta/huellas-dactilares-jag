<?php
    include_once 'db.php';

    class grupo extends db{

        private $nombreGrupo;
        private $gradosCursados;

        public function setNombreGrupo($nombreGrupo){
            $this->nombreGrupo = $nombreGrupo;
        }

        public function getNombreGrupo(){
            return $this->nombreGrupo;
        }

        public function setGradosCursados($arrayGradosCursados){
            $this->gradosCursados = implode(", ", $arrayGradosCursados);
        } 

        public function getGradosCursados(){
            return explode(", ", $this->gradosCursados);
        }

        public function añadirGrupo(){
            $query = $this->connect()->prepare('INSERT INTO jagdb.grupos (nombreGrupo, gradosCursados)
                                              VALUES (:nombreGrupo, :gradosCursados)');

            $query->execute(array(':nombreGrupo' => $this->nombreGrupo, ':gradosCursados' => $this->gradosCursados));
        }

        public function editarGrupo($nombreGrupoOriginal){
            $query = $this->connect()->prepare("UPDATE grupos
                                                SET nombreGrupo = :nombreGrupo, gradosCursados = :gradosCursados
                                                WHERE nombreGrupo = :nombreGrupoOriginal");
            
            $query->execute(array(':nombreGrupo' => $this->nombreGrupo,
            ':gradosCursados' => $this->gradosCursados, ':nombreGrupoOriginal' => $nombreGrupoOriginal));
        }

        public function eliminarGrupo(){
            $query = $this->connect()->prepare('DELETE FROM grupos WHERE nombreGrupo = :nombreGrupo');
            $query->execute(array(':nombreGrupo' => $this->nombreGrupo));
        }

        public function getGrupos(){
            return $this->connect()->query("SELECT nombreGrupo FROM grupos");
        }
    }
?>