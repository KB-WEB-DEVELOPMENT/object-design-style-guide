<?php

final class Foo
{
	// 'return' returns void data type
	public function someMethod(): void
	{
		if (/* check if script stops here */) {
			return;
		}
		
		// ...
	}

	public function someOtherMethod(): bool
	{
		if (/* check if script stops here */) {

			return false;
		}
		
		// ...
		
		return true;
	}
}
