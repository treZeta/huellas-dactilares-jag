<?php

class userSession
{

    public function __construct()
    {
        $sessionTime = 365 * 24 * 60 * 60; // 1 año de duración
        session_set_cookie_params($sessionTime);
        session_start();
    }

    public function setCurrentUser($user)
    {
        $_SESSION['user'] = $user;
    }

    public function getCurrentUser()
    {
        return $_SESSION['user'];
    }

    public function closeSession()
    {
        session_unset();
        session_destroy();
    }
}
