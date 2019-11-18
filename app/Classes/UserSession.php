<?php


namespace App\Classes\CustomerData;


trait UserSession
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function setLogin($user)
    {
        $_SESSION['is_logged'] = true;
        $_SESSION['username'] = $user->name;
        $_SESSION['email'] = $user->email;
    }

    public function isLogged()
    {
        return (boolean)(isset($_SESSION) && isset($_SESSION['is_logged']) ? $_SESSION['is_logged'] : false);
    }

    public function user()
    {
        return (object)[
            'username' => $_SESSION['username'],
            'email' => $_SESSION['email'],
        ];
    }

    public function setLogout()
    {
        session_unset();
    }
}