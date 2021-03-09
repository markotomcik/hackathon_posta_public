<?php

namespace App\Presenters;


use App\Model\OrderManager;

class OrderPresenter extends BasePresenter
{
    private $OrderManager;

    public function __construct(OrderManager $OrderManager)
    {
        parent::__construct();
        $this->OrderManager = $OrderManager;
    }

    public function renderDefault()
    {
        $Order = $this->OrderManager->getOrder();
        $this->template->Orders = $Order;
    }
}