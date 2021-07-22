<?php
header("Cache-control: no-store, no-cache, must-revalidate");
header("Expires: Mon, 26 Jun 1997 05:00:00 GMT");
header("Pragma: no-cache");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mi huella</title>
    <meta charset="UTF-8">
    <meta name="author" content="tirpitz">
    <meta name="robots" content="noindex">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=10; IE=EDGE" />
    <link rel="stylesheet" href="styles/main.css">
    <?php

    include("db.php");
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

    <?php
    include("js/validarCampos.js");
    ?>
</head>

<body>

    <?php
    // if (isset($_POST['nombres'])) {
    //     include_once 'includes/user.php';

    //     $nombres = $_POST['nombres'];
    //     $apellidos = $_POST['apellidos'];
    //     $id = $_POST['id'];
    //     $huella1 = $_POST['huella1'];
    //     $huella2 = $_POST['huella2'];
    //     $programaAlimentario = $_POST['programaAlimentario'];

    //     $user = new user();
    //     $user->setNombres($nombres);
    //     $user->setApellidos($apellidos);
    //     $user->setHuella1($huella1);
    //     $user->setHuella2($huella2);
    //     $user->setID($id);
    //     $user->setprogramaAlimentario($programaAlimentario);

    //     $user->addUser();
    // }
    ?>

    <form id="formRegistroUsuarios" name="formRegistroUsuarios" action="" method="POST" onsubmit="return validarCampos();">
        <h1>Registrar usuario</h1>
        <input type="text" name="nombres" id="nombres" placeholder="Nombres">
        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
        <input type="text" name="id" id="id" placeholder="ID">

        <div class="radioContainer">
            <input type="radio" name="programaAlimentario" checked id="checkboxAlmuerzo" value="Almuerzo">
            <label class="labelAlmuerzo" for="checkboxAlmuerzo">Almuerzo</label>
        </div>
        <div class="radioContainer">
            <input type="radio" name="programaAlimentario" id="checkboxRefrigerio" value="Refrigerio">
            <label class="labelRefrigerio" for="checkboxRefrigerio">Refrigerio</label>
        </div>

        <input type='hidden' name='huella1_id' id='huella1_id' value="" size='30'>
        <input type='hidden' name="huella1" id="huella1" value="" size="30">
        <input type='hidden' name='huella2_id' id='huella2_id' value="" size='30'>
        <input type='hidden' name="huella2" id="huella2" value="" size="30">
        <input type="submit" class="button" value="Guardar">

        <div class="fingerprint-reader-container">
            <?php
            echo $load_enroll_user;
            ?>
        </div>
    </form>

    <!-- <script src="jmu_create_user.vbs" type="text/vbscript"></script> -->
    <!-- <script src="js/validarCampos.js" type="text/javascript"></script> -->
</body>
<script type="text/vbscript">
    <?php
    include("jmu_create_user.vbs");
    ?> 
</script>

</html>