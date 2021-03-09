<?php

declare(strict_types=1);

namespace App\Model;

use Nette;
use Nette\Security\Passwords;

/**
 * Users management.
 */
final class NewReceiverManager
{
	use Nette\SmartObject;

	private const
		TABLE_NAME_PRIJEMCA = 'prijemca',
		COLUMN_ID_PRIJEMCA = 'prijemca_id',
        COLUMN_NAME_RECEIVER = 'meno',
        COLUMN_LASTNAME_RECEIVER = 'priezvisko',
        COLUMN_ADDRESS_RECEIVER = 'adresa',
        COLUMN_PSC_RECEIVER = 'psc',
        COLUMN_MAIL_RECEIVER = 'mail',
        COLUMN_PHONE_RECEIVER = 'phone';

	/** @var Nette\Database\Context */
	private $database;

	/** @var Passwords */
	private $passwords;

	public function __construct(Nette\Database\Context $database)
    {
		$this->database = $database;
	}

	public function add(string $firstname, string $lastname, string $address, string $psc, string $mail, string $phone, string $firstnameReceiver, string $lastnameReceiver, string $addressReceiver,
string $pscReceiver, string $mailReceiver, string $phoneReceiver, string $payMethod, string $notes): void
    {
        try {
            $this->database->table(self::TABLE_NAME_PRIJEMCA)->insert([
                self::COLUMN_NAME_RECEIVER => $firstnameReceiver,
                self::COLUMN_LASTNAME_RECEIVER => $lastnameReceiver,
                self::COLUMN_ADDRESS_RECEIVER => $addressReceiver,
                self::COLUMN_PSC_RECEIVER => $pscReceiver,
                self::COLUMN_MAIL_RECEIVER => $mailReceiver,
                self::COLUMN_PHONE_RECEIVER => $phoneReceiver
            ]);
        } catch (Nette\Database\UniqueConstraintViolationException $e) {
            throw new DuplicateNameException;
        }
    }
}