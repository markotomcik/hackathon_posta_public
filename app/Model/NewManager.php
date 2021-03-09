<?php

declare(strict_types=1);

namespace App\Model;

use Nette;
use Nette\Security\Passwords;

final class NewManager
{
	use Nette\SmartObject;

	private const
		TABLE_NAME_PRIJEMCA = 'prijemca',
        TABLE_NAME_ODOSIELATEL = 'odosielatel',
        TABLE_NAME_OBJEDNAVKY = 'objednavky',
		COLUMN_ID_PRIJEMCA = 'prijemca_id',
        COLUMN_ID_ODOSIELATEL = 'odosielatel_id',
        COLUMN_ID_OBJEDNAVKY = 'objednavka_id',
		COLUMN_NAME = 'meno',
		COLUMN_LASTNAME = 'priezvisko',
        COLUMN_ADDRESS = 'adresa',
        COLUMN_PSC = 'psc',
        COLUMN_MAIL = 'mail',
        COLUMN_PHONE = 'phone',
        COLUMN_NAME_RECEIVER = 'meno',
        COLUMN_LASTNAME_RECEIVER = 'priezvisko',
        COLUMN_ADDRESS_RECEIVER = 'adresa',
        COLUMN_PSC_RECEIVER = 'psc',
        COLUMN_MAIL_RECEIVER = 'mail',
        COLUMN_PHONE_RECEIVER = 'phone',
        COLUMN_NOTES = 'notes',
        COLUMN_PAY_METHOD = 'pay_method',
        COLUMN_PAY_CHECK = 'pay_check';

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
                self::COLUMN_PHONE => $phone,
                self::COLUMN_NAME_RECEIVER => $firstnameReceiver,
                self::COLUMN_LASTNAME_RECEIVER => $lastnameReceiver,
                self::COLUMN_ADDRESS_RECEIVER => $addressReceiver,
                self::COLUMN_PSC_RECEIVER => $pscReceiver,
                self::COLUMN_MAIL_RECEIVER => $mailReceiver,
                self::COLUMN_PHONE_RECEIVER => $phoneReceiver,
                self::COLUMN_PAY_METHOD => $payMethod,
                self::COLUMN_NOTES => $notes
            ]);
        } catch (Nette\Database\UniqueConstraintViolationException $e) {
            throw new DuplicateNameException;
        }
    }
}