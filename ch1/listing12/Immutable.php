<?php

class Immutable
{
	private int $someNumber;

	public function __construct(int $initialNumber):void
	{
		$this->someNumber = $initialNumber;
	}

	public function increase(): Immutable
	{
		return Immutable($this->someNumber + 1);
	}
}