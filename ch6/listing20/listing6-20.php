<?php

/*
Listing 6.20: The execute() method below as a command
method should technically be of the void type (that is it should not return anything,
unlike query method which have a specific return type), a controller
method always returns something. In this case, a response.
*/

final class RegisterUserController
{
	public function __construct(
		RegisterUser registerUser
	) {}
	
	public function execute(Request $request): Response
	{
		newUser = $this->registerUser->register($request->get('username'));

		return new Response(200,json_encode($newUser));
	}
}
