<?php

// custom exception class called 
final class Foo
{
	public function someMethod(): void
	{
		if (/* check if script stops here */) {
			throw new CanNotFindFoo();
		}
		
		// ...
	}
}