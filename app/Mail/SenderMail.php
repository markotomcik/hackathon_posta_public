<?php

declare(strict_types=1);

namespace App\Mail;

use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;
use latte\Engine;


final class SenderMail
{
    private $mailFrom;

    public function __construct() {
        $this->SenderMail = 'Pošta <info@debian>';
    }

    /**
     * @return mixed
     */
    public function getMailFrom($mailForm)
    {
        return $this->mailFrom = $mailForm;
    }

    public function deliveryInfo($mailTo)
    {
        $latte = new Engine;
        $mail = new Message;
        $mail->setFrom('info@debian.org', 'Posta')
             ->addTo($mailTo)
             ->setSubject('Info o doruceni')
            ->setHtmlBody(
                $latte->renderToString('Mail/email.latte', $params),
                '/path/to/images');

        $mailer = new SendmailMailer;
        $mailer->send($mail);

    }

}