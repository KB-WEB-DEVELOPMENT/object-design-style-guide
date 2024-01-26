<?php

class Foo
{
	public function __construct()
	{
		throw new RuntimeException();
	}		
}

try {
	$object1 = new Foo();
} catch (RuntimeException $exception) {
	// $object1 is undefined error ...
}	
	
