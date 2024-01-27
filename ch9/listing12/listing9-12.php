<?php

/*
listing 9.12: Listing showing how an event class (UserPasswordChanged)
can be used to trigger another event (SendUserPasswordChangedNotification), also called
an event listener.
*/

final class UserPasswordChanged
{
	public function __construct(
		private UserId $userId
	){}
}

final class SendUserPasswordChangedNotification
{
	// ...
	
	public function whenUserPasswordChanged(UserPasswordChanged $event): void
	{

	// Send the email...
	
	}
}
