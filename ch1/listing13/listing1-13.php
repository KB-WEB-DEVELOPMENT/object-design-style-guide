<?php

class Foo
{
	public function someMethod(): int
	{
		return /* ... */;
	}

	public function someOtherMethod(): void
	{
		// ...
	}
}

$object1 = new Foo();
$value = $object1->someMethod(); // $value is of integer type
$object1->someOtherMethod(); // void return type
