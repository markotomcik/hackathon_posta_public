<?php

namespace App\Presenters;


use App\Model\ReceiverManager;

class ReceiverPresenter extends BasePresenter
{
    private $ReceiverManager;

    public function __construct(ReceiverManager $ReceiverManager)
    {
        parent::__construct();
        $this->ReceiverManager = $ReceiverManager;
    }


    public function renderDefault()
    {
        $Receivers = $this->ReceiverManager->getReceivers();
        $this->template->Receivers = $Receivers;
    }
}