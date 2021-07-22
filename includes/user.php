<?php

    include 'db.php';

    class user extends db{

        private $username;


        public function userExists($user, $password){
            $md5pass = md5($password);

            $query = $this->connect()->prepare("SELECT * FROM administradores WHERE usuario = :usuario AND password = :password");
            $query->execute(['password' => $md5pass, 'usuario' => $user]);

            return $query->rowCount();
        }

        public function setUser($user){
            $query = $this->connect()->prepare('SELECT usuario FROM administradores WHERE usuario = :usuario');
            $query->execute(['usuario' => $user]);

            foreach($query as $currentUser){
                $this->username = $currentUser['usuario'];
            }
        }

        public function getUser(){
            return $this->username;
        }
    }

?>