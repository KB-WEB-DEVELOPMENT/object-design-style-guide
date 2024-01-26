<?php

/*
Listing 4.13 (compare with listing 4.12) : create a more useful method modifier 
toTheLeft(...) than the modifier withX(...) in listing 4-12.

*/

final class Position
{
	public function __construct(
		private int $x,
		private int $y
	){}
	
	public function toTheLeft(int $steps): Position
	{
		$copy = clone $this;
		
		$copy->x = $copy->x - $steps;

		return $copy;
	}
}

/*
Sample code:

$position = new Position(10,20);

$nextPosition = $position->toTheLeft(4);

var_dump(new Position(10,20) == $position); // 1 (true)

var_dump(new Position(6,20) == $nextPosition); // 1 (true)

*/
