<?php

namespace App\Controller;

use App\Model\UserModel;

class AuthController
{

    public function register($email, $firstname, $lastname, $password, $passwordConf)
    {
        $email = htmlspecialchars(trim($email));
        $firstname = htmlspecialchars(trim($firstname));
        $lastname = htmlspecialchars(trim($lastname));
        $password = htmlspecialchars(trim($password));
        $passwordConf = htmlspecialchars(trim($passwordConf));

        $model = new UserModel();
        if (
            !$model->isUserMailExist($email) &&
            $this->isPasswordsMatch($password, $passwordConf)
        ) {
            $model->register($email, $firstname, $lastname, password_hash($password, PASSWORD_DEFAULT));
            header('Location: /super-week/login');
        }
    }

    public function displayRegister()
    {
        require_once("src/View/register.php");
    }

    private function isPasswordsMatch($password, $passwordConf)
    {
        return $password === $passwordConf;
    }

    public function displayLogin()
    {
        require_once("src/View/login.php");
    }

    public function login($email, $password)
    {
        $model = new UserModel();
        if ($id = $model->isUserMailExist($email)) {
            $user = $model->getUserInfos($id);
            $hashedPassword = $user['password'];
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user'] = $user;
                header('Location: /super-week');
                die();
            }
        }
        header('Location: /super-week/login');
        die();
    }
}
