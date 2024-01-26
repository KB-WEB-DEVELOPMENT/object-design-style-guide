<?php 

// see listing 3.3, listing 3.4 and listing 3.5 in conjunction to make sense of code
declare(strict_types=1);

namespace MyClasses;

final class Coordinates
{
	// ...
	public function __construct(
		private float $latitude, 
		private float $longitude
	){

		if ($this->latitude > 90 || $this->latitude < -90) {
			throw new InvalidArgumentException('Latitude should be between -90 and 90');
		}
	
		if (longitude > 180 || longitude < -180) {
			throw new InvalidArgumentException('Longitude should be between -180 and 180');
		}
	
	}

	// ...
}