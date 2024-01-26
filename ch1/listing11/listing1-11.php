<?php

class Foo
{
	private int someNumber;

	// ...

	public function getSomeNumber(): int
	{
		return $this->someNumber;
	}
	
	public function getSomeNumberFrom(Foo $other): int
	{
		return $other->someNumber;
	}
}

$object1 = new Foo();
$object2 = new Foo();
$object2->getSomeNumberFrom($object1); // returns $object1 someNumber property value
