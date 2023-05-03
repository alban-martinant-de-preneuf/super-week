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
}
