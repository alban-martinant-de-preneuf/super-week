<?php

namespace App\Model;

use App\Model\DbConnection;

class BookModel
{
    private ?\PDO $_db = null;

    public function __construct()
    {
        $this->_db = DbConnection::getDb();
    }

    public function insertBook($title, $content, $userId)
    {
        $sqlQuery = ("INSERT INTO book (title, content, id_user)
            VALUES (:title, :content, :userId)"
        );
        $prepare = $this->_db->prepare($sqlQuery);
        $prepare->execute([
            'title' => $title,
            'content' => $content,
            'userId' => $userId
        ]);
    }

    public function getBooks()
    {
        $sqlQuery = ("SELECT id, title, content, id_user
            FROM book"
        );
        $prepare = $this->_db->prepare($sqlQuery);
        $prepare->execute();
        $fetchAllAssoc = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        return $fetchAllAssoc;
    }
}
