<?php

namespace App\Presenters;

use App\Model\UserManager;
use Nette\Security\User;
use Nette\Security\Identity;

final class UserPresenter extends BasePresenter
{
    public function startup()
    {
        parent::startup();
        if ($this->name != 'Admin:Auth') {
            if (!$this->user->isLoggedIn()) {
                if ($this->user->getLogoutReason() === User::INACTIVITY) {
                    $this->flashMessage('Session timeout, you have been logged out');
                }

                $this->redirect('Sign:in');

            } else {
                if ($this->user->isInRole("admin")) {
                    $this->flashMessage('Si admin.');
                } else {
                    $this->flashMessage('Smola. Si len doručovatel.');
                }
            }
        }
    }

    public function renderDefault(): void
    {

    }
}
