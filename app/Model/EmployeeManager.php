<?php

namespace App\Model;

class EmployeeManager extends DatabaseManager
{
    const
        TABLE_NAME = 'zamestnanci',
        COLUMN_ID = 'zamestnanec_id';

    public function getEmployees()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COLUMN_ID. ' DESC');
    }

    public function getEmployee($id)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->fetch();
    }

    public function removeEmployee($id)
    {
        $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
    }
}