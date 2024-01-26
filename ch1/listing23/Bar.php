<?php

final class Bar
{
	// A Foo instance is accepted by the bar() method
	public function bar(Foo $foo): void
	{
		$foo->someMethod();
	}
}
