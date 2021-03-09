<?php
declare(strict_types=1);

namespace App\Presenters;

use App\Forms;
use App\Forms\NewFormFactory;
use Nette\Application\UI\Form;


final class NewPresenter extends BasePresenter
{
    /** @persistent */
    public $backlink = '';

    private $newFactory;

    public function __construct(NewFormFactory $newFactory)
    {
        $this->newFactory = $newFactory;
    }

    protected function createComponentNewForm(): Form
    {
        return $this->newFactory->create(function (): void {
            $this->restoreRequest($this->backlink);
            $this->redirect('Homepage:');
        });
    }
}