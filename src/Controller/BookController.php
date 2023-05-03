<?php

namespace App\Controller;

use App\Model\BookModel;

class BookController {

    public function displayAddBook() {
        require_once('src/View/addbook.php');
    }

    public function addBook($title, $content, $userId)
    {
        $bookModel = new BookModel();
        $bookModel->insertBook($title, $content, $userId);
    }

}