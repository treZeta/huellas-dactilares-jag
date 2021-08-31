<?php
header("Cache-control: no-store, no-cache, must-revalidate");
header("Expires: Mon, 26 Jun 1997 05:00:00 GMT");
header("Pragma: no-cache");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=10">
    <meta name="author" content="Tirpitz">
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale:1.0">
    <script src="https://kit.fontawesome.com/7a32a48a5f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/logo_tirpitz_transparente.ico">
    <title>Editar usuario</title>
    <link rel="stylesheet" href="styles/main.css">


    <?php
    $jomutech = "254724482764";
    $start_key = "254724482764";
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/msie/', $user_agent)) {
        //INTERNET EXPLORER BROWSER
        $load_enroll_user = '<img id="NotActive" name="NotActive" src="../img/NotActivated.png" />';
        $load_veri = '<img id="NotActive" name="NotActive" src="../img/NotActivatedVer.png" />';
    } else {
        //START | MUITHI | SPAWN USER RIGHTS 11-SEPT-2013
        //-->require_once("jmu_modspawn.php");
        //END | MUITHI | 11-SEPT-2013

        //NON-INTERNET EXPLORER BROWSER
        $load_enroll_user = '<object id="DPFPEnrollmentUserRegn" classid="clsid:0B4409EF-FD2B-4680-9519-D18C528B265E" >
	<PARAM NAME="MaxEnrollFingerCount" VALUE="2">
	</object>';
    }
    ?>

</head>

<body>

    <?php

    include_once 'includes/userSession.php';
    $userSession = new userSession();

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_POST['idEstudianteOriginal']) && !isset($_POST['nombres'])) {
        header('Location: estudiantes.php');
    }

    include_once 'views/navBar.php';

    $idEstudianteOriginal = $_POST['idEstudianteOriginal'];
    $idHuellasOriginal = $_POST['idHuellasOriginal'];

    include_once 'includes/db.php';

    $db = new db();

    $query = $db->connect()->prepare('SELECT nombres, apellidos, nombreGrupo, genero, programaAlimentario FROM estudiantes WHERE idEstudiante = :id');
    $query->execute(array(':id' => $idEstudianteOriginal));

    foreach ($query as $estudiante) {
        $nombres = $estudiante['nombres'];
        $apellidos = $estudiante['apellidos'];
        $nombreGrupo = $estudiante['nombreGrupo'];
        $genero = $estudiante['genero'];
        $grupoEstudiante = $estudiante['nombreGrupo'];
        $programaAlimentario = $estudiante['programaAlimentario'];
    }

    $idEstudiante = $idEstudianteOriginal;

    $camposErroneos = array();

    if (isset($_POST['nombres'])) {

        $nombres = trim($_POST['nombres']);
        $apellidos = trim($_POST['apellidos']);
        $idEstudiante = trim($_POST['idEstudiante']);
        $grupoEstudiante = trim($_POST['grupo']);
        if(isset($_POST['genero'])){
            $genero = trim($_POST['genero']);
        }
        if(isset($_POST['programaAlimentario'])){
            $programaAlimentario = trim($_POST['programaAlimentario']);
        }
        if(isset($_POST['grupo'])){
            $grupoEstudiante = trim($_POST['grupo']);
        }
        $huella1 = trim($_POST['huella1']);
        $huella2 = trim($_POST['huella2']);

        if ($nombres == "") {
            array_push($camposErroneos, 'El estudiante debe tener un nombre');
        } else if (strlen($nombres) < 4 || strlen($nombres) > 30) {
            array_push($camposErroneos, 'El nombre debe contener entre 4 y 30 caracteres');
        }

        if ($apellidos == "") {
            array_push($camposErroneos, 'El estudiante debe tener un apellido');
        } else if (strlen($apellidos) < 5 || strlen($apellidos) > 30) {
            array_push($camposErroneos, 'Los apellidos deben contener entre 5 y 30 caracteres');
        }

        if ($idEstudiante == "") {
            array_push($camposErroneos, 'El estudiante debe tener un id');
        } else if (strlen($idEstudiante) < 5 || strlen($idEstudiante) > 30) {
            array_push($camposErroneos, 'El id debe contener entre 5 y 30 caracteres');
        }
        
        if ($programaAlimentario == ""){
            array_push($camposErroneos, 'EL estudiante debe tener un programa alimentario');
        }

        if ($genero == ""){
            array_push($camposErroneos, 'El estudiante debe tener un genero');
        }

        if ($grupoEstudiante == ""){
            array_push($camposErroneos, 'El estudiante debe pertenecer a un grupo');
        }

        if ($huella1 == "") {
            array_push($camposErroneos, 'No se ingreso la primera huella');
        }

        if ($huella2 == "") {
            array_push($camposErroneos, 'No se ingreso la segunda huella');
        }

        if (count($camposErroneos) > 0) {
            $camposErroneosHTML = "";

            foreach ($camposErroneos as $campoErroneo) {
                $camposErroneosHTML = $camposErroneosHTML . "<li><p>$campoErroneo</p></li>\n";
            }

    ?>

    <div class="error">
        <ul>
            <?php echo $camposErroneosHTML ?>
        </ul>
    </div>

    <?php
        } else {

        ?>
    <div class='correcto'>
        <ul>
            <li>
                <p>Datos correctos</p>
            </li>
        </ul>
    </div>

    <?php
            try {

                include_once 'includes/huellas.php';
                include_once 'includes/student.php';

                $nombres = trim($_POST['nombres']);
                $apellidos = trim($_POST['apellidos']);
                $idEstudiante = trim($_POST['idEstudiante']);
                $grupoEstudiante = trim($_POST['grupo']);
                $genero = trim($_POST['genero']);
                $huella1 = trim($_POST['huella1']);
                $huella2 = trim($_POST['huella2']);
                $programaAlimentario = trim($_POST['programaAlimentario']);


                $huellas = new huellas();
                $huellas->setIdHuellas($idEstudianteOriginal);
                $huellas->eliminarHuellas();
                $huellas->setIdHuellas($idEstudiante);
                $huellas->setHuella1($huella1);
                $huellas->setHuella2($huella2);
                $huellas->añadirHuellas();

                $student = new student();
                $student->setNombres($nombres);
                $student->setApellidos($apellidos);
                $student->setGenero($genero);
                $student->setNombreGrupo($grupoEstudiante);
                $student->setIdEstudiante($idEstudiante);
                $student->setIdHuellas($huellas->getIdHuellas());
                $student->setprogramaAlimentario($programaAlimentario);
                $student->editStudent($idEstudianteOriginal);

                $nombres = "";
                $apellidos = "";
                $idEstudiante = "";
                $programaAlimentario = "Almuerzo";
            ?>
    <div class='correcto'>
        <ul>
            <li>
                <p>El estudiante fue editado</p>
            </li>
        </ul>
    </div>
    <?php
                header('Location: estudiantes.php');
            } catch (PDOException $e) {
            ?>
    <div class="error">
        <ul>
            <li>
                <p><?php echo $e ?></p>
            </li>
        </ul>
    </div>

    <?php
            }
        }
    }
    ?>

    <?php

    include "views/studentForm.php";

    ?>

    <script type="text/javascript" src="js/validarCampos.js"></script>
</body>

<script type="text/vbscript" src="createUser.vbs"></script>

</html>