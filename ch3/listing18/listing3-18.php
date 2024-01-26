<?php

/*
Listing 3.18 (Compare with listing 3.17)
*/

final class EmailAddress
{
	public function __construct(
		private string $emailAddress
	)
	{
		if (!filter_var($this->emailAddress,FILTER_VALIDATE_EMAIL)) {
			throw new InvalidArgumentException('Invalid email address');
		}	
	}
}

final class User
{
	public function __construct(
		private EmailAddress $emailAddress
	){}
	
	// ...

	public function changeEmailAddress(EmailAddress $emailAddress): void
	{
		$this->emailAddress = $emailAddress;
	}
	
	// ...
}	
