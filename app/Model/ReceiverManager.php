<?php

namespace App\Model;

class ReceiverManager extends DatabaseManager
{
    const
        TABLE_NAME = 'prijemca',
        COLUMN_ID = 'prijemca_id';

    public function getReceivers()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COLUMN_ID. ' DESC');
    }

    public function getReceiver($id)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->fetch();
    }

    public function removeReceiver($id)
    {
        $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
    }
}