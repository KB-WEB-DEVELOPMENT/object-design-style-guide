<?php

/*
Listing 4.19 : Player class is mutable, Position class is immutable
*/

final class Player
{
	private Position $position;

	public function __construct(Position $initialPosition)
	{
		$this->position = $initialPosition;
	}
	
	public function moveLeft(int $steps): void
	{
		// see listings 4.14/4.15/4.16 for the implementation of toTheLeft(...)
		$this->position = $this->position->toTheLeft($steps);
	}
	
	public function currentPosition(): Position
	{
		return $this->position;
	}
}

/*
Listing 4.20: php unit test sample to test moveLeft() 
*/

function the_player_starts_at_a_position_and_can_move_left(): void
{
	$initialPosition = new Position(10,20);

	$player = new Player($initialPosition);

	$this->assertObjectEquals($initialPosition,$player->currentPosition());
	
	$player->moveLeft(4);

	$this->assertObjectEquals(new Position(6,20),$player->currentPosition());
}
