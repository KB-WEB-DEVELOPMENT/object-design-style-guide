<?php

// listing 4-21 (see previous Position listings): use your own method to compare two objects 
final class Position
{
	// ...
	
	public function equals(Position $other): bool
	{
		return ($this->x == $other->x && $this->y == $other->y);
	}

	// ...

}
