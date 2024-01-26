<?php

namespace MyClasses;

// simple class with unit tests
final class Foo
{
	private int $someNumber;

	public function __construct(int $startWith)
	{
		$this->someNumber = $startWith;
	}
	
	public function increment(): void
	{
		$this->someNumber++;
	}
	
	public function someNumber(): int
	{
		return $this->someNumber;
	}
}
