<?php

namespace MyClasses;

// Testing for failures
final class Foo
{
	private int $someNumber;

	public function __construct(int $startWith)
	{
		if ($startWith < 0) {
			throw new \InvalidArgumentException('A negative starting number is not allowed');
		}

		$this->someNumber = $startWith;
	}

	// ...
}
