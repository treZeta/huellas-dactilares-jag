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
    $errores = array();
    
    if (isset($_POST['user'])) {
        $usuario = trim($_POST['user']);
        if (trim($_POST['user']) == "") {
            array_push($errores, "usuario");
        }
        if (trim($_POST['password']) == "") {
            array_push($errores, "password");
        }
        
        if (count($errores) > 0) {
    
        ?>

    <?php
        } else {
    
            $userForm = trim($_POST['user']);
            $passForm = trim($_POST['password']);
    
            include_once 'includes/user.php';
    
            $user = new user();
    
            if ($user->userExists($userForm, $passForm)) {
    
                $userSession->setCurrentUser($userForm);
                header('Location: home.php');
                die();

            } else {
                array_push($errores, "login");
            }
        }
    }

    ?>
    <form autocomplete="off" id="formRegistroUsuarios" name="formRegistroUsuarios" action=""
        method="POST">

        <h1>Login</h1>
        <div class="input">
            <label for="user">
                <strong>Usuario</strong>
            </label>
            <input type="text" name="user" id="user" placeholder="Usuario" <?php echo "value='$usuario'" ?>>
            <?php
                if(isset($_POST['user'])){
                    foreach($errores as $error){
                        if($error == "usuario"){
                            ?>
                            <label for="usuario" class="error">
                                <strong class="error">Debes introducir un nombre de usuario</strong>
                            </label>
                            <?php
                        } else if($error == "login"){
                            ?>
                            <label for="usuario" class="error">
                                <strong class="error">Usuario y/o contraseña incorrectos</strong>
                            </label>
                            <?php
                        }
                    }
                }
                ?>
        </div>
        <div class="input">
            <label for="password">
            <strong>Contraseña</strong>  
            </label>
            <input type="password" name="password" id="password" placeholder="Contraseña">
            <?php
                if(isset($_POST['user'])){
                    foreach($errores as $error){
                        if($error == "password"){
                            ?>
                            <label for="password" class="error">
                                <strong class="error">Debes introducir una contraseña</strong>
                            </label>
                            <?php
                        }
                    }
                }
                ?>
        </div>
        <input type="submit" class="button" value="Iniciar Sesion">

    </form>
</div>