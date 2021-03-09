<?php

namespace App\Presenters;


use App\Model\DeliveryPlaceManager;
use App\Model\DeliveredManager;

class DeliveryPlacePresenter extends BasePresenter
{
    private $DeliveryPlaceManager;
    private $DeliveredManager;

    public function __construct(DeliveryPlaceManager $DeliveryPlaceManager, DeliveredManager $DeliveredManager)
    {
        parent::__construct();
        $this->DeliveredManager = $DeliveredManager;
        $this->DeliveryPlaceManager = $DeliveryPlaceManager;
    }


    public function renderDefault()
    {
        $DeliveryPlaces = $this->DeliveryPlaceManager->getDeliveryPlaces();
        $this->template->DeliveryPlaces = $DeliveryPlaces;
    }

    public function renderView($id)
    {

        $this->template->oneDelivered = $this->DeliveredManager->getOneDelivered($id);
        $this->template->deliveryPlace = $this->DeliveryPlaceManager->getDeliveryPlace($id);
    }
}