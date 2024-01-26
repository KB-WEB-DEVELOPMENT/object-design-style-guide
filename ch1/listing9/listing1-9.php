<?php

class Foo
{
	private int someNumber;

	public function __construct(int $initialNumber)
	{
		$this->someNumber = $initialNumber;
	}
}

$object1 = new Foo(); 
/* doesn't work, error resembling : (Fatal error: Uncaught ArgumentCountError: 
Too few arguments to function Foo::__construct(), 0 passed */

$object2 = new Foo(20); // works 
