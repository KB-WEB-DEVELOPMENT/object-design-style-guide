<?php

/*
Listing 7.6 (see better implementation, listing 7.7) - We create the new Recipients class 
whose uniqueEmailAddresse() method returns the list we need.
*/

final class Mailer
{
	// ...
	
	public function sendConfirmationEmails(Recipients $recipients): void
	{
		foreach ($recipients->uniqueEmailAddresses() as emailAddress) {
			// Send the email...
		}
	}
	
	// ...
}

final class Recipients
{
	private array $emailEmailAddresses;

	// ...

	public function uniqueEmailAddresses(): array
	{
		// Return a deduplicated list of of addresses...
	}
	
	// ...
	
}
