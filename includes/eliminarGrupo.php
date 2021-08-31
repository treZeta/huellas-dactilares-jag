<?php 

    include_once 'userSession.php';
    $userSession = new userSession();

    if(!isset($_SESSION['user'])){
        header('Location: ../home.php');
    }

    if(isset($_POST['nombreGrupoOriginal'])){

        try{

            $nombreGrupoOriginal = $_POST['nombreGrupoOriginal'];
    
            include_once 'grupo.php';
    
            $grupo = new grupo();
            $grupo->setNombreGrupo($nombreGrupoOriginal);
            $grupo->eliminarGrupo();
    
            header('Location: ../grupos.php');

        } catch (PDOException $e){
            print($e);
        }

    } else{
        header('Location: ../grupos.php');
    }


?>