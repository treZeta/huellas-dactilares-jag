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
    <title>Registrar Usuarios</title>
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

    include_once 'views/navBar.php';

    $camposErroneos = array();
    $nombres = "";
    $apellidos = "";
    $id = "";
    $programaAlimentario = "Almuerzo";

    if (isset($_POST['nombres'])) {

        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $id = $_POST['id'];
        $programaAlimentario = $_POST['programaAlimentario'];
        $huella1 = $_POST['huella1'];
        $huella2 = $_POST['huella2'];

        if (trim($nombres) == "") {
            array_push($camposErroneos, 'El usuario debe tener un nombre');
        } else if (strlen($nombres) < 4 || strlen($nombres) > 30) {
            array_push($camposErroneos, 'El nombre debe contener entre 4 y 30 caracteres');
        }

        if (trim($apellidos) == "") {
            array_push($camposErroneos, 'El usuario debe tener un apellido');
        } else if (strlen($apellidos) < 5 || strlen($apellidos) > 30) {
            array_push($camposErroneos, 'Los apellidos deben contener entre 5 y 30 caracteres');
        }

        if (trim($id) == "") {
            array_push($camposErroneos, 'El usuario debe tener un id');
        } else if (strlen($id) < 5 || strlen($id) > 30) {
            array_push($camposErroneos, 'El id debe contener entre 5 y 30 caracteres');
        }

        if (trim($huella1) == "") {
            array_push($camposErroneos, 'No se ingreso la primera huella');
        }

        if (trim($huella2) == "") {
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

                
                include_once 'includes/student.php';

                $nombres = $_POST['nombres'];
                $apellidos = $_POST['apellidos'];
                $id = $_POST['id'];
                $huella1 = $_POST['huella1'];
                $huella2 = $_POST['huella2'];
                $programaAlimentario = $_POST['programaAlimentario'];
                
                $student = new student();
                $student->setNombres($nombres);
                $student->setApellidos($apellidos);
                $student->setHuella1($huella1);
                $student->setHuella2($huella2);
                $student->setID($id);
                $student->setprogramaAlimentario($programaAlimentario);
                
                $student->addStudent();
                
                $nombres = "";
                $apellidos = "";
                $id = "";
                $programaAlimentario = "Almuerzo";
                ?>
                <div class='correcto'>
                    <ul>
                        <li>
                            <p>El usuario fue registrado</p>
                        </li>
                    </ul>
                </div>
            <?php
            } catch (PDOException $e) {
            ?>
                <div class="error">
                    <ul>
                        <li>
                            <p>El ID elegido ya esta en uso</p>
                        </li>
                    </ul>
                </div>

    <?php
            }
        }
    }
    ?>

    <?php

    include "views/registerStudentForm.php";

    ?>

    <script type="text/javascript" src="js/validarCampos.js"></script>
</body>

<script type="text/vbscript" src="jmu_create_user.vbs"></script>

</html>