<?php

namespace App\Controller;

use App\Model\UserModel;
use Faker;

class UserController implements InterfaceController
{

    public function getAll() : void
    {
        $model = new UserModel();
        echo json_encode($model->getAll());
    }

    public function getInfos(int $id)
    {
        $model = new UserModel();
        echo json_encode($model->getInfos($id));
    }

    public function getIds()
    {
        $model = new UserModel();
        return $model->getIds();
    }

    public function createItems(Faker\Generator $faker) : void
    {
        $userModel = new UserModel();

        for ($i = 0; $i < 10; $i++) {
            $firstname = $faker->firstName();
            $lastname = $faker->lastName();
            $email = strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $firstname . "-" . $lastname . "@" . $faker->freeEmailDomain()));
            $password = password_hash("pass", PASSWORD_DEFAULT);
            $userModel->insertOne([
                "email" => $email,
                "first_name" => $firstname,
                "last_name" => $lastname,
                "password" => $password
            ]);
        }
        echo "Users have been created";
    }

    public function delAll() : void
    {
        $userModel = new UserModel();
        $userModel->delAll();
        echo "Users have been deleted";
    }
}
