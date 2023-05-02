<?php

namespace App\Model;

use App\Model\DbConnection;

class UserModel
{
    private ?\PDO $_db = null;

    public function __construct()
    {
        $this->_db = DbConnection::getDb();
    }

    public function findAll()
    {
        $sqlQuery =  (
            "SELECT `id`, `email`, `first_name`, `last_name`
            FROM `user`"
        );
        $prepare= $this->_db->prepare($sqlQuery);
        $prepare->execute();
        $fetchAllAssoc = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($fetchAllAssoc);
    }
}
