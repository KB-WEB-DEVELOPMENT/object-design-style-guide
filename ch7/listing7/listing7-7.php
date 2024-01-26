<?php

/*
Listing 7.7: We take care of duplicate email addresses and protect the domain
invariant inside the Recipients class.
*/

final class Mailer
{
	// ...
	
	public function sendConfirmationEmails(Recipients $recipients): void
	{
		foreach ($recipients->emailAddresses() as $emailAddress) {
			// Send the email...
		}
	}
	
	// ...
}


final class Recipients
{
	private function __construct(
		private array $emailAddresses
	){}
	
	public static function emptyList(): Recipients
	{
		return new Recipients([]);
	}
	
	public function with(EmailAddress $emailAddress): Recipients
	{
		return in_array($emailAddress,$this->emailAddresses) ? $this : new self(array_merge($this->emailAddresses,[$emailAddress]));
	}
	
	public function emailAddresses(): array
	{
		return $this->emailAddresses;
	}
		
}

/*

Sample code:

$recipients = new Recipients(['kamibarut@yahoo.com','john_doe@gmail.com']);

$recipients->with('mary_doe@gmail.com');

var_dump($recipients->emailAddresses()); // array(3) {[0]=> string(19) "kamibarut@yahoo.com" [1]=> string(18) "john_doe@gmail.com" [2]=> string(18) "mary_doe@gmail.com"}

$mailer = new Mailer(// ... //);

$mailer->sendConfirmationEmail($recipients); // sends mail to kamibarut@yahoo, john_doe@gmail.com and mary_doe@gmail.com

var_dump($recipients->emptyList()); // object(Recipients)#1 (0) {}

*/
