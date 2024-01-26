<?php

/*
Listing 4.18 - Sample method in a php unit test,
testing the modifier toTheLeft(int $step) in the immutable Position object (see previous listings)
*/

public function it_can_move_to_the_left(): void
{
	$position = new Position(10,20);

	$nextPosition = $position->toTheLeft(4);
	
	$this->assertObjectEquals(new Position(6,20),$nextPosition);
}
