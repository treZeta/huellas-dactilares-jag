<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=10">
    <meta name="author" content="Tirpitz">
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale:1.0">
    <title>Home</title>
    <link rel="icon" href="img/logo_tirpitz_transparente.ico">
    <script src="https://kit.fontawesome.com/7a32a48a5f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <?php
    
    include_once 'includes/userSession.php';
    $userSession = new userSession();

    if(!isset($_SESSION['user'])){
        header('Location: login.php');
    } 

    include_once 'views/navBar.php';
    ?>
    <h1 style="color: #ffffff; padding-top: 23vh;">Bienvenido <?php echo $_SESSION['user'] ?></h1>
</body>

</html>