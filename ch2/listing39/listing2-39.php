<?php

/* 
Ex: The service container uses a public method for retrieving the controller.
All other services defined in the service container can remain private.
There are only injected as dependencies to the controller.
The service container is used as a service locator from which we retrieve a controller.
*/
final class ServiceContainer
{
	public function homepageController(): HomepageController
	{
		return new HomepageController(
			$this->userRepository(),
			$this->responseFactory(),
			$this->templateRenderer()
		);
	}
	
	private function userRepository(): UserRepository
	{
		// ...
	}
	
	private function responseFactory(): ResponseFactory
	{
		// ...
	}
	
	private function templateRenderer(): TemplateRenderer
	{
		// ...
	}

	// ...
}

/*

The framework could use a router to find the right controller for the current request.
It can then fetch the controller from the service locator and let it handle the request.

Sample code as an example (could also use a switch statement) :

if ($uri == '/') {
	$controller = (new ServiceContainer())->homepageController();
	// ...
	$response = $controller->execute($request);
	// ...
	} elseif (// ... //) {

	// ...
}

*/



