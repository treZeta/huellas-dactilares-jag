<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Tirpitz">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="icon" href="img/logo_tirpitz_transparente.ico">
    <title>Reclamo PAE</title>
</head>

<body>
    <?php

    date_default_timezone_set('America/Bogota');
    include_once 'includes/userSession.php';
    $userSession = new userSession();

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (isset($_POST['idEstudianteRegistrar'])) {
        $idEstudiante = $_POST['idEstudianteRegistrar'];
        $programaAlimentario = $_POST['programaAlimentarioRegistrar'];
        try {
            include_once 'includes/entregaPae.php';
            $entregaPae = new entregaPae();
            $entregaPae->setIdEstudiante($idEstudiante);
            $entregaPae->setIdEntrega();
            $entregaPae->setProgramaAlimentario($programaAlimentario);
            $entregaPae->setFecha();
            $entregaPae->añadirEntrega();
            if($programaAlimentario == "Almuerzo"){
                header('Location: sistemaPae.php?service="Checked"');
            } else{
                header('Location: sistemaPae.php');
            }

        } catch (PDOException $e) {
            print($e);
        }
    }

    $idEstudiante = $_GET['idEstudiante'];

    include_once 'includes/db.php';

    $db = new db();

    $query = $db->connect()->prepare("SELECT nombres, apellidos, programaAlimentario FROM estudiantes WHERE idEstudiante = :idEstudiante");
    $query->execute(array(':idEstudiante' => $idEstudiante));

    foreach ($query as $estudiante) {
        $nombres = $estudiante['nombres'];
        $apellidos = $estudiante['apellidos'];
        $programaAlimentario = $estudiante['programaAlimentario'];
    }

    $query = $db->connect()->prepare("SELECT COUNT(*) FROM entregaPae WHERE idEstudiante = :idEstudiante AND fecha LIKE :fecha");
    $query->execute(array(":idEstudiante" => $idEstudiante, ":fecha" => date("Y-m-d") . "%"));
    $numeroEntregas = $query->fetchColumn();

    ?>

    <div class="container">
        <p class="p-registro"><?php echo $nombres ?> <?php echo $apellidos ?> puede reclamar el
            <?php echo $programaAlimentario ?></p>
        <p class="p-registro">Ya lo ha reclamado, contando esta, <?php echo $numeroEntregas + 1 ?> veces </p>
        <form style="display: inline-block; margin-left: 191px;margin-right: 13px;" action="sistemaPae.php" method="POST">
            <input type="hidden" name="service" value="<?php if ($programaAlimentario == "Almuerzo") {
                                                            echo "checked";
                                                        }  ?>">
            <input type="submit" class="button-secondary" value="Cancelar">
        </form>
        <form style="display: inline-block;" action="" method="POST">
            <input type="hidden" name="idEstudianteRegistrar" value="<?php echo $idEstudiante ?>"">
                <input type="hidden" name="programaAlimentarioRegistrar" value="<?php echo $programaAlimentario ?>"">
                <input type="submit" class="button" value="Aceptar">
        </form>
    </div>

</body>

</html>