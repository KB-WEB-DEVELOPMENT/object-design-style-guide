<?php

/*
Listing 4.12 (alternative to listing 4.11): 
We use the clone operator to make a copy of the Immutable object and modify its properties.
*/

final class Position
{

	public function __construct(
		private int $x,
		private int $y
	){}
	
	public function withX(int $x): Position
	{
		$copy = clone $this;
		
		$copy->x = $x;

		return $copy;
	}
}

/*

Sample code:

$position = new Position(10,20);

$nextPosition = $position->withX(6);

var_dump(new Position(6,20) == $nextPosition); // 1 (true)

var_dump(new Position(6,20) === $nextPosition); // 0 (false)
*/
