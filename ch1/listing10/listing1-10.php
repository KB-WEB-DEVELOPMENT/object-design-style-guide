<?php

class Foo
{
	public readonly int $someNumber;

	public string $someString;

	// 

}

$object1 = new Foo();

$number = $object1->someNumber; // retrieving an immutable property and assigning it to a variable 

$object1->someString = 'Cliché'; // setting property value
