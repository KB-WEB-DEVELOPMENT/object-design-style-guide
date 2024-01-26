<?php

/*
Listing 4.15 - Refer to listings 4.13,4.14 : Replace toTheLeft() with moveLeft()
*/

final class Position
{
	// ...
	public function moveLeft(int $steps): Position
	{
		// ...
	}
}

/*
Listing 4.16 - Refer to listings 4.13,4.14 : toTheLeft() is more suitable than moveLeft()
*/

final class Position
{
	// ...
	public function toTheLeft(int $steps): Position
	{
		// ...
	}
}
