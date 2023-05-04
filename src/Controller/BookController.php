<?php

namespace App\Controller;

use App\Model\BookModel;
use App\Model\UserModel;

class BookController
{

    public function displayAddBook()
    {
        require_once('src/View/addbook.php');
    }

    public function addBook($title, $content, $userId)
    {
        $bookModel = new BookModel();
        $bookModel->insertBook(
            htmlspecialchars($title),
            htmlspecialchars($content),
            htmlspecialchars($userId)
        );
        header('Location: /super-week');
    }

    public function getBooks()
    {
        $bookModel = new BookModel();
        echo json_encode($bookModel->getBooks());
    }

    public function getBookInfos($id)
    {
        $bookModel = new BookModel();
        echo json_encode($bookModel->getBookInfos($id));
    }

    public function createBooks($faker)
    {
        $bookModel = new BookModel();
        $userModel = new UserModel();
        $userIds = $userModel->getIds();
        
        if (!empty($userIds)) {
            for ($i = 0; $i < 10; $i++) {
                $titre = $faker->text(20);
                $content = $faker->sentence(200);
                $userId = array_rand($userIds);
                $bookModel->insertBook($titre, $content, $userId);
            }
            echo "Books have been created";
        } else {
            echo "Impossible to create books because there are no users !";
        }
    }

    public function delBooks()
    {
        $bookModel = new BookModel();
        $bookModel->delBooks();
        echo "Books have been deleted";
    }
}
