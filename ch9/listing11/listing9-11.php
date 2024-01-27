<?php

/*
listing 9.11: Shows how to use objects to add multiple commands within a method if needed  
*/
final class ChangeUserPassword
{
	public function __construct(
		private PasswordEncoder passwordEncoder,
		/* ... */
	){
	 // ...
	}
	
	public function changeUserPassword(UserId $userId,string $plainTextPassword): void
	{
		// step 1: The service hashes the password.  
		
		$encodedPassword = $this->passwordEncoder->encode($plainTextPassword);
		
		// ...

		// step 2: The service stores the password.
		
		// Further steps ...
	}
}
