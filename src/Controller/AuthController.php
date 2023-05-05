<?php

namespace App\Controller;

use App\Model\UserModel;

class AuthController
{

    public function register(
        string $email,
        string $firstname,
        string $lastname,
        string $password,
        string $passwordConf
        ) : void
    {
        $email = htmlspecialchars(trim($email));
        $firstname = htmlspecialchars(trim($firstname));
        $lastname = htmlspecialchars(trim($lastname));
        $password = htmlspecialchars(trim($password));
        $passwordConf = htmlspecialchars(trim($passwordConf));

        $userModel = new UserModel();
        if (
            !$userModel->isUserMailExist($email) &&
            $this->isPasswordsMatch($password, $passwordConf)
        ) {
            $userModel->insertOne([
                "email" => $email,
                "first_name" => $firstname,
                "last_name" => $lastname,
                "password" => password_hash($password, PASSWORD_DEFAULT)
            ]);
            header('Location: /super-week/login');
        }
    }

    public function displayRegister() : void
    {
        require_once("src/View/register.php");
    }

    private function isPasswordsMatch(string $password, string $passwordConf) : bool
    {
        return $password === $passwordConf;
    }

    public function displayLogin() : void
    {
        require_once("src/View/login.php");
    }

    public function login(string $email, string $password) : void
    {
        $model = new UserModel();
        if ($id = $model->isUserMailExist($email)) {
            $user = $model->getInfos($id);
            $hashedPassword = $user['password'];
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user'] = $user;
                header('Location: /super-week');
                die();
            }
        }
        setcookie("connection", "failed", time() + 2);
        header('Location: /super-week/login');
        die();
    }
}
