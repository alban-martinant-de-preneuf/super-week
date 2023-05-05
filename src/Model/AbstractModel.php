<?php

namespace App\Model;

abstract class AbstractModel
{
    protected ?\PDO $_db = null;
    protected string $_table = "";

    public function __construct()
    {
        $this->_db = DbConnection::getDb();
    }

    public function getAll()
    {
        $sqlQuery = ("SELECT *
            FROM $this->_table"
        );
        $prepare = $this->_db->prepare($sqlQuery);
        $prepare->execute();
        $fetchAllAssoc = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        return $fetchAllAssoc;
    }

    public function delAll()
    {
        $sqlQuery = "TRUNCATE `super_week`.`$this->_table`";
        $prepare = $this->_db->prepare($sqlQuery);
        $prepare->execute();
    }

    public function getInfos($id)
    {
        $sqlQuery = ("SELECT *
            FROM $this->_table
            WHERE id = :id"
        );
        $prepare = $this->_db->prepare($sqlQuery);
        $prepare->execute(['id' => $id]);
        $fetchAssoc = $prepare->fetch(\PDO::FETCH_ASSOC);
        return $fetchAssoc;
    }

    public function insertOne(array $columns)
    {
        $columnNames = "(";
        $columnValues = "(";
        foreach ($columns as $column => $value) {
            $columnNames .= $column . ", ";
            $columnValues .= ":" . $column . ", ";
        }
        $columnNames = substr($columnNames, 0, -2);
        $columnValues = substr($columnValues, 0, -2);
        $columnNames .= ")";
        $columnValues .= ")";

        $sqlQuery = ("INSERT INTO " . $this->_table . " " . $columnNames .
            " VALUES " . $columnValues
        );

        $prepare = $this->_db->prepare($sqlQuery);
        $prepare->execute($columns);
    }
}
