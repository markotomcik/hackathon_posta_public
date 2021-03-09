<?php

declare(strict_types=1);

namespace App\Model;

use Nette;
use Nette\Security\Passwords;

/**
 * Users management.
 */
final class NewSenderManager
{
	use Nette\SmartObject;

	private const
		TABLE_NAME_ODOSIELATEL = 'odosielatel',
        COLUMN_ID_ODOSIELATEL = 'odosielatel_id',
		COLUMN_NAME = 'meno',
		COLUMN_LASTNAME = 'priezvisko',
        COLUMN_ADDRESS = 'adresa',
        COLUMN_PSC = 'psc',
        COLUMN_MAIL = 'mail',
        COLUMN_PHONE = 'phone';

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
            $this->database->table(self::TABLE_NAME_ODOSIELATEL)->insert([
                self::COLUMN_NAME => $firstname,
                self::COLUMN_LASTNAME => $lastname,
                self::COLUMN_ADDRESS => $address,
                self::COLUMN_PSC => $psc,
                self::COLUMN_MAIL => $mail,
                self::COLUMN_PHONE => $phone
            ]);
        } catch (Nette\Database\UniqueConstraintViolationException $e) {
            throw new DuplicateNameException;
        }
    }
}