<?php

/* 
see listing3-1.php, the object here behaves consistently
*/
final class Position
{
	public function __construct(
		private int $x,
		private int $y
	){}
		
	public function distanceTo(Position $other): float
	{
		return sqrt(
			($other->x - $this->x) ** 2 +
			($other->y - $this->y) ** 2
		);
	}
}

/*
position = new Position(45,60); $x and $y have been provided, the object behaves consistently
*/
