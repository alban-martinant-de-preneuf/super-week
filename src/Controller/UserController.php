<?php

namespace App\Controller;

use App\Model\UserModel;

class UserController {

    public function findAll() {
        $model = new UserModel();
        echo $model->findAll();
    }

    public function getUserInfos($id) {
        $model = new UserModel();
        echo json_encode($model->getUserInfos($id));
    }

}