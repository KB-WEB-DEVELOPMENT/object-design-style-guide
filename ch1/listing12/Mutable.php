<?php

class Mutable
{
	private int $someNumber;

	public function __construct(int $initialNumber):void
	{
		$this->someNumber = $initialNumber;
	}

	public function increase(): void
	{
		$this>someNumber = $this->someNumber + 1;
	}
}