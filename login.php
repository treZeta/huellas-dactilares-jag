<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=10">
    <meta name="author" content="Tirpitz">
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale:1.0">
    <title>Login</title>
    <link rel="icon" href="public/img/logo_tirpitz_transparente.ico">
    <link rel="stylesheet" href="public/styles/main.css">
</head>

<div class="container">
    <?php

    include_once 'includes/userSession.php';
    $userSession = new userSession();

    if (isset($_SESSION['user'])) {
        header('Location: home.php');
    }

    $usuario = "";
    $camposErroneos = array();

    if (isset($_POST['user'])) {
        $usuario = $_POST['user'];
        if (trim($usuario) == "") {
            array_push($camposErroneos, "Debes introducir un nombre de usuario");
        }
        if (trim($_POST['password']) == "") {
            array_push($camposErroneos, "Debes introducir una contraseña");
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
    
            $userForm = $_POST['user'];
            $passForm = $_POST['password'];
    
            include_once 'includes/user.php';
    
            $user = new user();
    
            if ($user->userExists($userForm, $passForm)) {
    
                $userSession->setCurrentUser($userForm);
                header('Location: home.php');
                die();

            } else {
            ?>
    <div class="error">
        <ul>
            <li>
                <p>Usuario y/o contraseña incorrectos</p>
            </li>
        </ul>
    </div>
    <?php
            }
        }
    }

    ?>
    <form autocomplete="off" id="formRegistroUsuarios" name="formRegistroUsuarios" action=""
        method="POST">

        <h1>Login</h1>
        <input type="text" name="user" id="user" placeholder="Usuario" <?php echo "value='$usuario'" ?>>
        <input type="password" name="password" id="password" placeholder="Contraseña">
        <input type="submit" class="button" value="Iniciar Sesion">

    </form>
</div>