<?php

/*
Listing 7.8: (Method inside a class) - The method shows an exception
to the Command-query separation (CQS) principle in imperative programming.
Here, we first use a query method to retrieve the user and then multiple
command methods to change his/her password.
*/

public function changeUserPassword(UserId $userId,string $plainTextPassword): void
 {
	$user = $this->repository->getById($userId);

	$hashedPassword = password_hash($plainTextPassword,PASSWORD_DEFAULT);

	$user->changePassword($hashedPassword);

	$this->repository->save($user);

	$this->eventDispatcher->dispatch(new UserPasswordChanged($userId));
}
