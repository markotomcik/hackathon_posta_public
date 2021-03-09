<?php

namespace App\Presenters;


use App\Model\EmployeeManager;

class EmployeePresenter extends BasePresenter
{
    private $EmployeeManager;

    public function __construct(EmployeeManager $EmployeeManager)
    {
        parent::__construct();
        $this->EmployeeManager = $EmployeeManager;
    }


    public function renderDefault()
    {
        $Employees = $this->EmployeeManager->getEmployees();
        $this->template->Employees = $Employees;
    }
}