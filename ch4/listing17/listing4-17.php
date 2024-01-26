<?php

/*
Listing 4.17 - Sample method in a php unit test,
testing the modifier moveLeft(int $step) in the mutable Position object (see previous listings)
*/

public function it_can_move_to_the_left(): void
{
	$position = new Position(10, 20);

	$position->moveLeft(4);

	$this->assertSame(6,$position->x()); // assume the getter x() returns x with correct data type
}
