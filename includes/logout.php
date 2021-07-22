<?php

    include_once 'userSession.php';

    $session = new userSession();

    $session->closeSession();

    header('Location: ../login.php');
    die();

?>