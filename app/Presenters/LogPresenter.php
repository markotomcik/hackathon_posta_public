<?php

namespace App\Presenters;


use App\Model\LogManager;

class LogPresenter extends BasePresenter
{
    private $LogManager;

    public function __construct(LogManager $LogManager)
    {
        parent::__construct();
        $this->LogManager = $LogManager;
    }


    public function renderDefault()
    {
        $Logs = $this->LogManager->getLogs();
        $this->template->Logs = $Logs;
    }
}