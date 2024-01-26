<?php

/*
Listing 7.3: We split the event in two tasks : (1) UserPasswordChanged() (2) SendEmail().
SendEmail is an event listener service for the UserPasswordChanged event. When notified
of the event, this listener will send the email. 
The eventDispatcher implementation is taken care of in listing 7.4
*/

final class UserPasswordChanged
{

	public function __construct(
		private UserId $userId
		/* ...  other dependencies ... */
	){}
	
	public function userId(): UserId
	{
		return $this->userId;
	}

	public function changeUserPassword(UserId $userId,string $plainTextPassword): void 
	{
		$user = $this->repository->getById($userId);

		$hashedPassword = password_hash($plainTextPassword,PASSWORD_DEFAULT);

		$user->changePassword($hashedPassword);

		$this->repository->save($user);

		$this->eventDispatcher->dispatch(new self($userId));
	}
}


final class SendEmail
{
		public function __construct(
		/* ...  various dependencies ... */
	){}
	
	// ...
	
	public function whenUserPasswordChanged(UserPasswordChanged $event): void
	{
		$this->mailer->sendPasswordChangedEmail($event->userId());
	}
	
	// ...
}
