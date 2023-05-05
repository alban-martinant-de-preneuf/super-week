<?php

namespace App\Model;

class UserModel extends AbstractModel
{
    protected string $_table = "user";

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

}
