<?php

namespace App\Model;

class LogManager extends DatabaseManager
{
    const
        TABLE_NAME = 'log',
        COLUMN_ID = 'log_id';

    public function getLogs()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COLUMN_ID. ' DESC');
    }

    public function getLog($id)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->fetch();
    }

    public function removeLog($id)
    {
        $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
    }
}