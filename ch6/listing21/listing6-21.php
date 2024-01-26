<?php

/*
Listing 6.21: Listing meant to show the difference between query methods (nextIdentifier(),getById())
and command methods (register()). We make use of the CQS (Command Query Separation) principle,
which should be followed as a rule. (There are some exceptions.)
*/

final class RegisterUserController
{
	public function __construct(
		private UserRepository $userRepository,
		private RegisterUser $registerUser,
		private UserReadModelRepository $userReadModelRepository
	){}
	
	public function execute(Request $request): Response
	{
		$userId = $this->userRepository->nextIdentifier();

		$this->registerUser->register($userId,$request->get('username'));

		$newUser = $this->userReadModelRepository->getById($userId);

		return new Response(200,json_encode($newUser));
	}
}
