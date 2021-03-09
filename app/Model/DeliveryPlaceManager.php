<?php

namespace App\Model;

class DeliveryPlaceManager extends DatabaseManager
{
    const
        TABLE_NAME = 'odovzdavacie_miesta',
        COLUMN_ID = 'id_address';

    public function getDeliveryPlaces()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COLUMN_ID. ' DESC');
    }

    public function getDeliveryPlace($id)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->fetch();
    }

    public function removeDeliveryPlace($id)
    {
        $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
    }
}