<?php

/*
listing 3.17 : Do not do this as the same logic is repeated in multiple places
see solution listing 3.18
*/
final class User
{
	public function __construct(
		private string $emailAddress
	){
		if (!filter_var($this->emailAddress,FILTER_VALIDATE_EMAIL)) {
			throw new InvalidArgumentException('Invalid email address');
		}	
	}

	// ...

	public function changeEmailAddress(string $emailAddress): void
	{
		if (!filter_var($emailAddress,FILTER_VALIDATE_EMAIL)) {
			throw new InvalidArgumentException('Invalid email address');
		}
	
		$this->emailAddress = $emailAddress;
	}

	// ...
}	
	
