<?php

namespace App\Controller;

// use App\Model\BookModel;

class BookController {

    // public function findAll() {
    //     $model = new UserModel();
    //     return $model->findAll();
    // }

    // public function getUserInfos($id) {
    //     $model = new UserModel();
    //     echo json_encode($model->getUserInfos($id));
    // }

    public function displayAddBook() {
        require_once('src/View/addbook.php');
    }

}