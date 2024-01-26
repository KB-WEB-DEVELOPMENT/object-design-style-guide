<?php

/*
Listing 3.21 : EventDispatcher uses an assertion.
Note that the package beberlei/assert must be installed through composer with:
composer require beberlei/assert
Alternatively, I can create my own assertion functions.
*/
use Assert\Assertion;

final class EventDispatcher
{
	public function __construct(array $eventListeners)
	{
		# https://github.com/beberlei/assert/tree/master?tab=readme-ov-file#all-helper
		Assertion::allIsInstanceOf($eventListeners,'EventListener');
		// ...
	}

	//
}
