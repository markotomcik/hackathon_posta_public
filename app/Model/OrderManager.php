<?php

namespace App\Model;

class OrderManager extends DatabaseManager
{
    const
        TABLE_NAME = 'objednavky',
        COLUMN_ID = 'objednavka_id';

    public function getOrder()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COLUMN_ID. ' DESC');
    }

    public function getOneOrder($id)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID , $id)->fetch();
    }

    public function removeOneOrder($id)
    {
        $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
    }


}