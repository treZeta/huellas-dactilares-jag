<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=10">
    <meta name="author" content="Tirpitz">
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale:1.0">
    <script src="https://kit.fontawesome.com/7a32a48a5f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="public/img/logo_tirpitz_transparente.ico">
    <title>Registrar Programa Alimentario</title>
    <link rel="stylesheet" href="public/styles/main.css">
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
    $nombreProgramaAlimentario = "";

    if (isset($_POST['nombreProgramaAlimentario'])) {
        $nombreProgramaAlimentario = trim($_POST['nombreProgramaAlimentario']);


        if (strlen($nombreProgramaAlimentario) < 2) {
            array_push($camposErroneos, "El nombre del programa alimentario debe contener al menos dos caracteres");
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
            
            try {

                $nombreProgramaAlimentario = trim($_POST['nombreProgramaAlimentario']);
                
                include_once 'includes/programaAlimentario.php';
                $programaAlimentario = new programaAlimentario();
                $programaAlimentario->setNombreProgramaAlimentario($nombreProgramaAlimentario);
                $programaAlimentario->añadirProgramaAlimentario();
                
                $nombreProgramaAlimentario = "";
                header('Location: programasAlimentarios.php');

            } catch (PDOException $e) {
                $nombreEnUso = true;
            }
        }
    }

    include_once 'views/programaForm.php';
    ?>

</body>

</html>