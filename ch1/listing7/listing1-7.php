<?php

class Foo
{
	private int someNumber;
	private string someString;

	public function __construct()
	{
		$this->someNumber = 10;
		$this->someString = 'Hello, world!';
	}
}


$object1 = new Foo();
echo $object1->someNumber; // 10
echo $object1->someString; // 'Hello, world!'
