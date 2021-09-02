<?php 

    include_once 'userSession.php';
    $userSession = new userSession();

    if(!isset($_SESSION['user'])){
        header('Location: ../home.php');
    }

    if(isset($_POST['nombreProgramaAlimentarioOriginal'])){

        try{

            $nombreProgramaAlimentario = $_POST['nombreProgramaAlimentarioOriginal'];
    
            include_once 'programaAlimentario.php';
    
            $programaAlimentario = new programaAlimentario();
            $programaAlimentario->setNombreProgramaAlimentario($nombreProgramaAlimentario);
            $programaAlimentario->eliminarProgramaAlimentario();
    
            header('Location: ../programasAlimentarios.php');

        } catch (PDOException $e){
            header('Location: ../programasAlimentarios.php?error=101');
        }

    } else{
        header('Location: ../programasAlimentarios.php');
    }


?>