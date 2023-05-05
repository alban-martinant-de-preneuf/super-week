<?php

namespace App\Controller;

use App\Model\BookModel;
use App\Model\UserModel;
use Faker;

class BookController implements InterfaceController
{

    public function displayRegisterForm() : void
    {
        require_once('src/View/addbook.php');
    }

    public function register(array $column) : void
    {
        $bookModel = new BookModel();
        $bookModel->insertOne($column);
        header('Location: /super-week');
    }

    public function getAll() : void
    {
        $bookModel = new BookModel();
        echo json_encode($bookModel->getAll());
    }

    public function getInfos(int $id) : void
    {
        $bookModel = new BookModel();
        echo json_encode($bookModel->getInfos($id));
    }

    public function createItems(Faker\Generator $faker) : void
    {
        $bookModel = new BookModel();
        $userModel = new UserModel();
        $userIds = $userModel->getIds();
        
        if (!empty($userIds)) {
            for ($i = 0; $i < 10; $i++) {
                $title = $faker->text(20);
                $content = $faker->sentence(200);
                $userId = array_rand($userIds);
                $bookModel->insertOne([
                    "title" => $title,
                    "content" => $content,
                    "id_user" => $userId
                ]);
            }
            echo "Books have been created";
        } else {
            echo "Impossible to create books because there are no users !";
        }
    }

    public function delAll() : void
    {
        $bookModel = new BookModel();
        $bookModel->delAll();
        echo "Books have been deleted";
    }
}
