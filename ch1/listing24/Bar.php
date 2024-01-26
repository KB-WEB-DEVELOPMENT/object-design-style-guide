<?php

final class Bar
{
	// Any Foo instance, an interface, is accepted by bar()
	public function bar(Foo $foo): void
	{
		$foo->someMethod();
	}
}
