<?php

namespace App\Model;

class DistrictManager extends DatabaseManager
{
    const
        TABLE_NAME = 'rajon',
        COLUMN_ID = 'rajon_id';

    public function getDistricts()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COLUMN_ID. ' DESC');
    }

    public function getDistrict($id)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->fetch();
    }

    public function removeDistrict($id)
    {
        $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
    }
}