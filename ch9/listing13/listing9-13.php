<?php

/*
listing 9.13: Example of how a service (ChangeUserPassword) uses
a dispatcher object (EventDispatcher) to dispatch an event (UserPasswordChanged)  
and trigger a event listener(SendUserPasswordChangedNotification).
Look at how the service is implemented below.
*/

final class ChangeUserPassword
{
	
	public function __construct(
		// ... //,
		private PasswordEncoder $passwordEncoder,
		private EventDispatcher $eventDispatcher
	) {
     	// ...
	}
	
	public function changeUserPassword(UserId $userId,string $plainTextPassword): void
	{
		// hash new password
		$encodedPassword = $this->passwordEncoder->encode($plainTextPassword);

		// ...

		$this->eventDispatcher->dispatch(new UserPasswordChanged($userId));
	}
}


/*

Code implementation:

$userId = new UserId(123); // obtained from client through a request object

$event = new UserPasswordChanged($userId); // see listing9-12.php

$event_listener = new SendUserPasswordChangedNotification(// ... //); // see listing9-12.php

$method_listener = 'whenUserPasswordChanged'; // see listing9-12.php

$args_listener = $userId;

$eventDispatcher = new EventDispatcher([ get_class($event) => [ $event_listener, $method_listener,args_listiner ] ]); // basic event dispatcher

$passwordEncoder = new PasswordEncoder(// ... //); // basic entity
										
$changeUserPasswordService = new ChangeUserPassword(// ... //,$passwordEncoder,$eventDispatcher); // listing9-13

$plainTextPassword = 'test_password'; // obtained from client through a request object

$changeUserPasswordService->changeUserPassword($userId,$plainTextPassword); // listing9-13

*/
