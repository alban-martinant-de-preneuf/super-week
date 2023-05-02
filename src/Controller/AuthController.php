<?php

namespace App\Controller;

use App\Model\UserModel;

class AuthController {

    public function register($email, $firstname, $lastname) {
        $model = new UserModel();
        if (!$model->isUserMailExist($email)) {
            $model->register($email, $firstname, $lastname);
        }
    }

}