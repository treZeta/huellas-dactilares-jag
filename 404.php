<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=10">
    <meta name="author" content="Tirpitz">
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale:1.0">
    <title>Pagina no encontrada</title>
    <link rel="icon" href="img/logo_tirpitz_transparente.ico">
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <?php

    include 'includes/userSession.php';
    $session = new userSession();
    $padding_top_h1 = "29vh";

    if (isset($_SESSION['user'])) {
        include_once 'views/navBar.php';
        $padding_top_h1 = "13vh";
    }

    ?>
    <h1 style="color: #ffffff; padding-top: <?php echo $padding_top_h1 ?>; font-size: 50px">Error 404</h1>
    <p style="color: #ffffff; text-align: center; padding-top: 25px; font-size: 25px">Lo sentimos, la pagina no pudo ser encontrada</p>
    <a style="margin-top: 40px;" href="home.php" class="button">Regresar al inicio</a>
</body>

</html>