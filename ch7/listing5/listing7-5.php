<?php

/*
Listing 7.5: We make the immutable Mailer Service does not sent
an email to a recipient more than once. (see better implementations - listings 7.6/7.7)
*/

final class Mailer
{
	private array $sentTo = [];

	// ...

	public function sendConfirmationEmail(EmailAddress $recipient): void
	{
		if (in_array($recipient,$this->sentTo)) {
			return;
		}

		$this->sentTo[] = $recipient;
	}
	
	// ...
}

/*

Sample code:

$mailer = new Mailer(// ... //);

$recipient = EmailAddress->fromString('kamibarut@yahoo.com');

$mailer->sendConfirmationEmail($recipient); // confirmation email sent

$mailer->sendConfirmationEmail(recipient); // confirmation email not sent again

*/
