<?php

/*  
This works but should be avoided as the constructor is not meant to call methods.
*/
final class Router
{
	public function __construct(
		private array $controllers
	){
		foreach ($this->controllers as $pattern => $controller) {
			$this->addController($pattern,$controller);
		}
	}
	
	private function addController(string $pattern,string $controller): void
	{
		$this->controllers[$pattern] = $controller;
	}
	
	public function match(string $uri): bool
	{
		foreach ($this->controllers as $pattern => $controller) {
			if (strcmp($uri,$pattern) == 0 && is_string($controller)) {
				return true;
			}
		}
		
		return false;
	}

}

/*

$router = new Router(
			[ '/' => 'homepage_controller',
			 (some more valid key - value pairs ...) 
			]
		);
		
$router->match('/');

output: 1 (True)

*/
