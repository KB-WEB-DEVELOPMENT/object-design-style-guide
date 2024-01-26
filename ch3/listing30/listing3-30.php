<?php

/*

Listing 3.30 : Avoid this, avoid "property fillers". Keep the construction 
of the object fully controlled by the object itself with the use of a constructor.

*/

final class Position
{
	private int $x;
	private int $y;

	public static function fromArray(array $data): Position
	{
		$position = new Position();
		$position->x = $data['x'];
		$position->y = $data['y'];

		return $position;
	}
}
