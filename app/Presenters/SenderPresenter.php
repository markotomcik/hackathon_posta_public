<?php

namespace App\Presenters;


use App\Model\SenderManager;

class SenderPresenter extends BasePresenter
{
    private $SenderManager;

    public function __construct(SenderManager $SenderManager)
    {
        parent::__construct();
        $this->SenderManager = $SenderManager;
    }


    public function renderDefault()
    {
        $Senders = $this->SenderManager->getSenders();
        $this->template->Senders = $Senders;
    }
}