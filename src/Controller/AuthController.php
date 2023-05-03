<?php

namespace App\Controller;

use App\Model\UserModel;

class AuthController
{

    public function register($email, $firstname, $lastname, $password, $passwordConf)
    {
        $email = htmlspecialchars($email);
        $firstname = htmlspecialchars($firstname);
        $lastname = htmlspecialchars($lastname);
        $password = htmlspecialchars($password);
        $passwordConf = htmlspecialchars($passwordConf);

        $model = new UserModel();
        var_dump($model->isUserMailExist($email));
        if (
            !$model->isUserMailExist($email) &&
            $this->isPasswordsMatch($password, $passwordConf)
        ) {
            $model->register($email, $firstname, $lastname, password_hash($password, PASSWORD_DEFAULT));
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
        if ($id = $model->isUserMailExist($email))
        {
            $user = $model->getUserInfos($id);
            $hashedPassword = $user['password'];
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user'] = $user;
            }
        }
    }
}
