<?php

/*  
Choosing to have the instantiated object validate the controllers array in the constructor
and throw an exception if needed.
Note that there are more efficient ways to do this to avoid running 2 consecutive foreach loops.
I am following the logic of the book.
*/
final class Router
{
	public function __construct(
		private array $controllers
	){
		
		foreach (array_keys($this->controllers) as $pattern) {
			if (!is_string($pattern)) {
				throw new InvalidArgumentException('All URI patterns should be provided as strings');
			}
		}
		
		foreach ($this->controllers as $controller) {
			if (!is_string($controller)) {
				throw new InvalidArgumentException('All controllers should be provided as strings');
			}
		}		
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
