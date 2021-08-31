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
</head>

<body>

    <?php

    include_once 'includes/userSession.php';
    $userSession = new userSession();

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_POST['nombreGrupoOriginal']) && !isset($_POST['nombreGrupo'])) {
        header('Location: grupos.php');
    }

    $nombreGrupoOriginal = $_POST['nombreGrupoOriginal'];

    include_once 'includes/db.php';

    $db = new db();

    $query = $db->connect()->prepare('SELECT nombreGrupo, gradosCursados FROM grupos WHERE nombreGrupo = :nombreGrupoOriginal');
    $query->execute(array(':nombreGrupoOriginal' => $nombreGrupoOriginal));

    foreach ($query as $grupo) {
        $nombreGrupo = $grupo['nombreGrupo'];
        $gradosCursados = explode(", " ,$grupo['gradosCursados']);
    }

    $nombreGrupo = $nombreGrupoOriginal;

    $camposErroneos = array();

    if (isset($_POST['nombreGrupo'])) {
        $nombreGrupo = trim($_POST['nombreGrupo']);

        if (isset($_POST['gradosCursados'])) {
            $gradosCursados = $_POST['gradosCursados'];
        }

        if (strlen($nombreGrupo) < 1) {
            array_push($camposErroneos, "El grupo debe tener un nombre");
        }
        if (count($gradosCursados) < 1) {
            array_push($camposErroneos, "El grupo debe conformar al menos un grado");
        }

        if (count($camposErroneos) > 0) {
            $camposErroneosHTML = "";

            foreach ($camposErroneos as $campoErroneo) {
                $camposErroneosHTML = $camposErroneosHTML . "<li><p>$campoErroneo</p></li>";
            }

    ?>

    <div class="error">
        <ul>
            <?php echo $camposErroneosHTML; ?>
        </ul>
    </div>

    <?php
        } else {
        ?>
    <div class="correcto">
        <ul>
            <li>
                <p>Datos correctos</p>
            </li>
        </ul>
    </div>

    <?php
            try {

                $nombreGrupo = trim($_POST['nombreGrupo']);
                $gradosCursados = $_POST['gradosCursados'];

                include_once 'includes/grupo.php';

                $grupo = new grupo();
                $grupo->setNombreGrupo($nombreGrupo);
                $grupo->setGradosCursados($gradosCursados);
                $grupo->editarGrupo($nombreGrupoOriginal);

            ?>

    <div class="correcto">
        <ul>
            <li>
                <p>El grupo ha sido editado correctamente</p>
            </li>
        </ul>
    </div>

    <?php
            header('Location: grupos.php');
            } catch (PDOException $e) {
            ?>
    <div class="error">
        <ul>
            <li>
                <p>El nombre elegido ya esta en uso</p>
            </li>
        </ul>
    </div>
    <?php
            }
        }
    }

    include_once 'views/groupForm.php';
    ?>

</body>

</html>