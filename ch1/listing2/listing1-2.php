<?php

class Foo
{
	public function someMethod(): void
	{
	}
}

$object1 = new Foo();
$object1->someMethod(); // (new Foo)->someMethod();
