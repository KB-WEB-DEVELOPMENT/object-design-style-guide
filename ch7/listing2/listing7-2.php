<?php

/*
Listing 7.2: The changeUserPassword() method conducts too many tasks.
We should use events as the link between changing the password and sending 
an email about it. (See how this approach works in listings 7.3/7.4/7.5/7.6/7.7/7.8/7.9) 
*/

public function changeUserPassword(UserId $userId,string $plainTextPassword): void
{
	$user = $this->repository->getById($userId);

	$hashedPassword = /* ... */;

	$user->changePassword($hashedPassword);

	$this->repository->save($user);

	$this->mailer->sendPasswordChangedEmail($userId);
}
