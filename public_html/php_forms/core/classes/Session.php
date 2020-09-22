<?php

namespace Core;

use App\App;

class Session
{
    private $user;

    public function __construct()
    {
        $this->loginFromCookie();
    }
    public function loginFromCookie()
    {
        if (!empty($_SESSION)) {
            if ($this->login($_SESSION['email'], $_SESSION['password'])) {
                return true;
            }
        }
        return false;
    }
    public function login($email, $password)
    {
        $users = App::$db->getRowsWhere('users', ['email' => $email, 'password' => $password]);
        if ($users) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $this->user = reset($users);
            return true;
        }
        return false;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function logout($redirect = false)
    {
        setcookie('PHPSESSID', null, -1);
        session_destroy();
        $_SESSION = [];
        if ($redirect) {
            header('Location: $redirect');
            exit;
        }
    }
}
