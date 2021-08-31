<?php 

    include_once 'userSession.php';
    $userSession = new userSession();

    if(!isset($_SESSION['user'])){
        header('Location: ../home.php');
    }

    if(isset($_POST['idEstudianteOriginal'])){

        $idEstudiante = $_POST['idEstudianteOriginal'];
        $idHuellas = $_POST['idHuellasOriginal'];

        include_once 'student.php';
        include_once 'huellas.php';

        $estudiante = new student();
        $estudiante->setIdEstudiante($idEstudiante);
        $estudiante->deleteStudent();
        
        $huellas = new huellas();
        $huellas->setIdHuellas($idEstudiante);
        $huellas->eliminarHuellas();

        header('Location: ../estudiantes.php');
    } else{
        header('Location: ../estudiantes.php');
    }


?>