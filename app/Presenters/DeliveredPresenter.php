<?php

namespace App\Presenters;


use App\Model\DeliveredManager;

class DeliveredPresenter extends BasePresenter
{
    private $DeliveredManager;

    public function __construct(DeliveredManager $DeliveredManager)
    {
        parent::__construct();
        $this->DeliveredManager = $DeliveredManager;
    }


    public function renderDefault()
    {
        $Delivered = $this->DeliveredManager->getDelivered();
        $this->template->Delivered = $Delivered;
    }
}