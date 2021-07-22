<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="treZeta">
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
    
    $id = $_GET['jmu1'];

    include_once 'includes/db.php';

    $db = new db();

    $query = $db->connect()->prepare("SELECT nombres, apellidos, ultimoReclamo, programaAlimentario FROM estudiantes WHERE id = :id");
    $query->execute(array(':id' => $id));

    foreach ($query as $row) {
        $nombres = $row['nombres'];
        $apellidos = $row['apellidos'];
        $ultimoReclamo = $row['ultimoReclamo'];
        $programaAlimentario = $row['programaAlimentario'];
    }

    if ($ultimoReclamo != date("Y-m-d")) {
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

        $query = $db->connect()->prepare("UPDATE estudiantes SET ultimoReclamo = :fecha WHERE id = :id");
        $query->execute(array(":fecha" => date("Y-m-d"), ":id" => $id));
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