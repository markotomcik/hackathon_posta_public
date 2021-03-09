<?php

namespace App\Model;

class SenderManager extends DatabaseManager
{
    const
        TABLE_NAME = 'odosielatel',
        COLUMN_ID = 'odosielatel_id';

    public function getSenders()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COLUMN_ID. ' DESC');
    }

    public function getSender($id)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->fetch();
    }

    public function removeSender($id)
    {
        $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
    }
}