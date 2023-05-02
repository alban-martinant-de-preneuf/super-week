<?php

namespace App\Controller;

use App\Model\UserModel;

class UserController {

    public function findAll() {
        $model = new UserModel();
        return $model->findAll();
    }

}