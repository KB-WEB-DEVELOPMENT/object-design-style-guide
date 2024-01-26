<?php

/*
Example of choosing not to throw an exception, assuming it does not break
the object's behaviour at a later stage
*/
final class Router
{
	public function __construct(
		private array $controllers,
		private string $notFoundController,
	){}
	
	public function match(string $uri): string
	{
		foreach ($this->controllers as $pattern => $controller) {
			if (strcmp($uri,$pattern) == 0 && is_string($controller)) {
				return $controller;
			}
		}
		
		return $this->notFoundController;
	}

}

/*

$router = new Router(
			[ '/' => 'homepage_controller',
			 (some more key - value pairs ...) 
			],
			'not-found'
		);
		
$router->match('/');

output:  homepage_controller

*/
