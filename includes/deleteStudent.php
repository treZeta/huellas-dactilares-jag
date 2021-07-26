<?php 

    include 'userSession.php';
    $userSession = new userSession();

    if(!isset($_SESSION['user'])){
        header('Location: ../home.php');
    }

    if(isset($_POST['id_estudiante'])){

        $studentId = $_POST['id_estudiante'];

        include_once 'student.php';

        $student = new student();
        $student->setID($studentId);
        $student->deleteStudent();

        header('Location: ../estudiantes.php');
    } else{
        header('Location: ../home.php');
    }


?>