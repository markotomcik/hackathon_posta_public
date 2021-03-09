<?php

namespace App\Presenters;


use App\Model\DistrictManager;

class DistrictPresenter extends BasePresenter
{
    private $DistrictManager;

    public function __construct(DistrictManager $DistrictManager)
    {
        parent::__construct();
        $this->DistrictManager = $DistrictManager;
    }

    public function renderDefault()
    {
        $Districts = $this->DistrictManager->getDistricts();
        $this->template->Districts = $Districts;
    }
}