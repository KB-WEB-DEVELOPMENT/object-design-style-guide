<?php

final class Bar
{
	private Foo $foo;

	// The provided Foo instance gets assigned to the $foo property
	public function __construct(Foo $foo)
	{
		$this->foo = $foo;
	}
}
