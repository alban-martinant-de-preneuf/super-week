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
        $sqlQuery =  ("SELECT `id`, `email`, `first_name`, `last_name`
            FROM `user`"
        );
        $prepare = $this->_db->prepare($sqlQuery);
        $prepare->execute();
        $fetchAllAssoc = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($fetchAllAssoc);
    }

    public function isUserMailExist($email)
    {
        $sqlQuery = ("SELECT id
            FROM user
            WHERE email = :email"
        );
        $prepare = $this->_db->prepare($sqlQuery);
        $prepare->execute(['email' => $email]);
        $result = $prepare->fetchColumn();
        return $result;
    }

    public function register($email, $firstname, $lastname, $password)
    {
        $sqlQuery = ("INSERT INTO user (email, first_name, last_name, password)
            VALUES (:email, :firstname, :lastname, :password)"
        );
        $prepare = $this->_db->prepare($sqlQuery);
        $prepare->execute([
            'email' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'password' => $password
        ]);
    }

    public function getUserInfos($id)
    {
        $sqlQuery =  ("SELECT `id`, `email`, `first_name`, `last_name`, `password`
            FROM `user`
            WHERE id = :id"
        );
        $prepare = $this->_db->prepare($sqlQuery);
        $prepare->execute(["id" => $id]);
        $fetchAssoc = $prepare->fetch(\PDO::FETCH_ASSOC);
        return $fetchAssoc;
    }

    public function getIds()
    {
        $sqlQuery =  ("SELECT `id`
            FROM `user`"
        );
        $prepare = $this->_db->prepare($sqlQuery);
        $prepare->execute();
        $ids = $prepare->fetchAll(\PDO::FETCH_COLUMN);
        return $ids;
    }

    public function delUsers()
    {
        $sqlQuery = "TRUNCATE `super_week`.`user`";
        $prepare = $this->_db->prepare($sqlQuery);
        $prepare->execute();
    }


}
