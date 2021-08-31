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

    include_once 'includes/userSession.php';
    $userSession = new userSession();

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }
    
    $idEstudiante = $_GET['jmu1'];

    include_once 'includes/db.php';

    $db = new db();

    $query = $db->connect()->prepare("SELECT nombres, apellidos, programaAlimentario FROM estudiantes WHERE idEstudiante = :idEstudiante");
    $query->execute(array(':idEstudiante' => $idEstudiante));

    foreach ($query as $estudiante) {
        $nombres = $estudiante['nombres'];
        $apellidos = $estudiante['apellidos'];
        $programaAlimentario = $estudiante['programaAlimentario'];
    }

    $query = $db->connect()->prepare("SELECT COUNT(*) FROM entregaPae WHERE idEstudiante = :idEstudiante AND fecha = :fecha");
    $query->execute(array(":idEstudiante" => $idEstudiante, ":fecha" => date("Y-m-d")));
    $entregado = $query->fetchColumn();
    print($entregado);

    if ($entregado == 0) {
    ?>

        <div class="container">
            <form action="sistemaPae.php" method="POST">
                <p class="p-registro"><?php echo $nombres ?> <?php echo $apellidos ?> puede reclamar el <?php echo $programaAlimentario ?></p>
                <input type="hidden" name="service" value="<?php if ($programaAlimentario == "Almuerzo") {
                                                                echo "checked";
                                                            }  ?>">
                <input type="submit" class="button" value="Regresar">
            </form>
        </div>

    <?php

        try{
            include_once 'includes/entregaPae.php';
            $entregaPae = new entregaPae();
            $entregaPae->setIdEstudiante($idEstudiante);
            $entregaPae->setIdEntrega();
            $entregaPae->setProgramaAlimentario($programaAlimentario);
            $entregaPae->setFecha();
            $entregaPae->añadirEntrega();

        } catch(PDOException $e){
            print($e);
        }
    } else {
    ?>
        <div class="container">
            <form action="sistemaPae.php" method="POST">
                <p class="p-registro"><?php echo $nombres ?> <?php echo $apellidos ?> ya reclamó el <?php echo $programaAlimentario ?></p>
                <input type="hidden" name="service" value="<?php if ($programaAlimentario == "Almuerzo") {
                                                                echo "checked";
                                                            }  ?>">
                <input type="submit" class="button" value="Regresar">
            </form>
        </div>

    <?php
    }

    ?>
</body>

</html>