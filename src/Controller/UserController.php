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

    public function getIds() {
        $model = new UserModel();
        return $model->getIds();
    }

    public function createUsers($faker) {
        $userModel = new UserModel();

        for ($i = 0; $i < 10; $i++) {
            $email = $faker->email();
            $firstname = $faker->firstName();
            $lastname = $faker->lastName();
            $password = password_hash("pass", PASSWORD_DEFAULT);
            $userModel->register($email, $firstname, $lastname, $password);
        }
    }

}