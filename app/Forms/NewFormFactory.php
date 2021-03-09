<?php

namespace App\Forms;

use App\Model\NewOrderManager;
use App\Model\NewSenderManager;
use App\Model\NewReceiverManager;
use Nette\Application\UI\Form;
use Nette;

class NewFormFactory
{
    use Nette\SmartObject;

    private $factory;

    private $newOrderManager;
    private $newSenderManager;
    private $newReceiverManager;

    public function __construct(FormFactory $factory, NewOrderManager $newOrderManager, NewReceiverManager $newReceiverManager, NewSenderManager $newSenderManager)
    {
        $this->factory = $factory;
        $this->newOrderManager = $newOrderManager;
        $this->newReceiverManager = $newReceiverManager;
        $this->newSenderManager = $newSenderManager;
    }

    protected function create(callable $onSuccess): Form
    {
        $form = new Form;
        $form->addText('firstname', 'Meno odosielatela:');
        $form->addText('lastname', 'Priezvisko odosielatela:');
        $form->addText('address', 'Adresa odosielatela:');
        $form->addText('psc', 'PSČ odosielatela:');
        $form->addText('mail', 'E-mail odosielatela:');
        $form->addText('phone', 'Telefónne číslo odosielatela:');
        $form->addText('firstnameReceiver', 'Meno adresáta:');
        $form->addText('lastnameReceiver', 'Priezvisko adresáta:');
        $form->addText('addressReceiver', 'Adresa adresáta:');
        $form->addText('pscReceiver', 'PSČ adresáta:');
        $form->addText('mailReceiver', 'E-mail adresáta:');
        $form->addText('phoneReceiver', 'Telefónne číslo adresáta:');
        $form->addRadioList('payMethod', 'Spôsob platby', ['karta', 'hotovosť']);
        $form->addTextArea('notes', 'Poznámky', 6, 3);
        $form->addSubmit('send', 'Odoslať');
        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }
}