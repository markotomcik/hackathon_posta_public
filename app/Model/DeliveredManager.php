<?php

namespace App\Model;

class DeliveredManager extends DatabaseManager
{
    const
        TABLE_NAME = 'preberanie',
        COLUMN_ID = 'preberanie_id',
        COLUMN_ID_ADDRESS = 'id_address';

    public function getDelivered()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COLUMN_ID. ' DESC');
    }

    public function getOneDelivered($id)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID , $id)->fetch();
    }

    public function removeOneDelivered($id)
    {
        $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
    }


}