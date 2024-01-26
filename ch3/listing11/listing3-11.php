<?php

/*
listing3.11 : Creating a line object - Validating constructor arguments may
not always be the best option. Here, there are 4 checks to be made:
- Line dotted and property $isDotted set to true
- Line dotted and property $distanceBetweenDots > 0
- Line solid and property $isDotted set to false
- Line solid and property $distanceBetweenDots > 0
*/

final class Line
{
	public function __construct(
		private bool $isDotted,
		private int $distanceBetweenDots
	) {
		if ($this->isDotted && $this->distanceBetweenDots <= 0) {
			throw new InvalidArgumentException(
				'Expect the distance between dots to be positive.'
			);
		}

		// ...
	}
}


// listing 3.12 : better solution - use two specific methods
 
final class Line
{
	private bool $isDotted;
	private int $distanceBetweenDots = 0;

	public static function dotted(int $distanceBetweenDots): Line
	{
		if ($distanceBetweenDots <= 0) {
			throw new InvalidArgumentException('We expect the distance between dots to be positive.');
		}
		
		$line = new self();
		$line->isDotted = true;
		$line->distanceBetweenDots = $distanceBetweenDots;

		return $line;
	}
	
	public static function solid(): Line
	{
		$line = new self();
		$line->isDotted = false;
		// By default : $line->distanceBetweenDots = 0

		return $line;
	}
} 

/*

sample code:

$dottedLine = Line::dotted(5);

$solidLine = Line::solid()

*/
