<?php

//  class public method calling class private methods
class Foo
{
	public function someMethod(): int
	{
		$value = $this->stepOne();
		
		return $this->stepTwo($value);
	}

	private function stepOne(): int
	{
		// ...
	}
	
	private function stepTwo(int $value): int
	{
		// ...
	}
}

$obj1 = new Foo();
$obj1->someMethod // returns int
