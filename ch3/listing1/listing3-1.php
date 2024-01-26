<?php

/* 
designed to show that the object is an inconsistent state,
meaning that if we call distanceTo() before setX() or setY(), 
we do not get a meaningful answer.
*/
final class Position
{
	private int $x;
	private int $y;

	public function __construct()
	{
		// empty on purpose !
	}
	
	public function setX(int $x): void
	{
		$this->x = $x;
	}
	
	public function setY(int $y): void
	{
		$this->y = $y;
	}
	
	public function distanceTo(Position $other): float
	{
		return sqrt(
			($other->x - $this->x) ** 2 +
			($other->y - $this->y) ** 2
		);
	}
}

/*
$position = new Position();
$position->setX(45);
$position->setY(60);
*/
