<?php

/*
Listing 4.14 - Note that the Player position is mutable but the Player initial position is immutable
The Position class is immutable.
*/

final class Player
{
	private Position $position;
	
	public function __construct(
		Position $initialPosition
	){
		$this->position = $initialPosition;		
	}
	
	public function moveLeft(int $steps): void
	{
		$this->position = $this->position->toTheLeft($steps);
	}
	
	public function currentPosition(): Position
	{
		return $this->position;
	}
}

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
