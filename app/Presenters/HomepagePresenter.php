<?php

declare(strict_types=1);

namespace App\Presenters;


final class HomepagePresenter extends BasePresenter
{
    public function startup()
    {
        parent::startup();
        if ($this->name != 'Admin:Auth') {
            if ($this->user->isLoggedIn()) {
                $this->redirect('User:default');
            }
        }
    }

    public function renderDefault(): void
	{
		$this->template->anyVariable = 'any value';
	}
}
