<?php

abstract class Foo
{
	// abstract class needs to be defined in subclass
	abstract public function foo(): void;

	// bar() method already implemented in this class
	public function bar(): void
	{
		// ...
	}
}