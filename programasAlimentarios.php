<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=10">
    <meta name="author" content="Tirpitz">
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale:1.0">
    <title>Programas alimentarios</title>
    <link rel="icon" href="img/logo_tirpitz_transparente.ico">
    <script src="https://kit.fontawesome.com/7a32a48a5f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <?php

    include_once 'includes/userSession.php';
    $userSession = new userSession();

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    include_once 'views/navBar.php';
    include_once 'includes/table.php';

    $table = new table(50, "programasAlimentarios");

    ?>

    <div class="container">
        <?php
        if (isset($_GET['error'])) {
            if($_GET['error'] = 101){

            
        ?>
        <div class="error">
            <ul>
                <li>
                    <p>No se puede eliminar el programa alimentario ya que hay estudiantes asociados a este</p>
                </li>
            </ul>
        </div>

        <?php
            }
        }
        ?>
        <div id="paginas">
            <?php $table->mostrarPaginas() ?>
        </div>
        <a class="button" href="registrarProgramaAlimentario.php">Agregar programa</a>
        <div id="estudiantes">
            <?php $table->mostrarProgramasAlimentarios(); ?>
        </div>
        <div style="margin-top: 40px" id="paginas">
            <?php $table->mostrarPaginas() ?>
        </div>
    </div>

</body>

</html>