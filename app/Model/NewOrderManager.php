<?php

declare(strict_types=1);

namespace App\Model;

use Nette;
use Nette\Security\Passwords;

/**
 * Users management.
 */
final class NewOrderManager
{
	use Nette\SmartObject;

	private const
        TABLE_NAME_OBJEDNAVKY = 'objednavky',
        COLUMN_ID_OBJEDNAVKY = 'objednavka_id',
        COLUMN_ID_PRIJEMCA = 'prijemca_id',
        COLUMN_ID_ODOSIELATEL = 'odosielatel_id',
        COLUMN_NOTES = 'notes',
        COLUMN_PAY_METHOD = 'pay_method',
        COLUMN_PAY_CHECK = 'pay_check',
	    COLUMN_TIME = 'time';

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
            $this->database->table(self::TABLE_NAME_OBJEDNAVKY)->insert([
                self::COLUMN_PAY_METHOD => $payMethod,
                self::COLUMN_NOTES => $notes
            ]);
        } catch (Nette\Database\UniqueConstraintViolationException $e) {
            throw new DuplicateNameException;
        }
    }
}