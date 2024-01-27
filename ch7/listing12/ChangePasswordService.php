<?php

/*

Listing 7.12: We want to unit test ChangePasswordService using a mock (see ChangePasswordServiceTest.php file)

*/

namespace MyClasses;

final class ChangePasswordService
{
	public function __construct(
		private EventDispatcher $eventDispatcher
		// ...
	){}
	
	public function changeUserPassword(UserId $userId,string $plainTextPassword): void
	{
		// ...

		$this->eventDispatcher->dispatch(
			new UserPasswordChanged($userId)
		);
	}
	
	// ...
}

