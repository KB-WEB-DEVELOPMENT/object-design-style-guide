<?php 

/*
Listing 3.22 : 
Note that the package beberlei/assert must be installed through composer with:
composer require beberlei/assert
Alternatively, I can create my own assertion functions.
*/
declare(strict_types=1);

namespace MyClasses;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class Coordinates
{
	// ...
	public function __construct(
		private float $latitude, 
		private float $longitude
	){
		// ...
		
		try {
				# https://github.com/beberlei/assert?tab=readme-ov-file#list-of-assertions
				# https://github.com/beberlei/assert?tab=readme-ov-file#exception--error-handling
				
				Assertion::between($this->latitude,-90.0,90.0,'Latitude should be between -90 and 90');
			} catch(AssertionFailedException $e) {
				$e->getValue();
		}

		try {
				# https://github.com/beberlei/assert?tab=readme-ov-file#list-of-assertions
				# https://github.com/beberlei/assert?tab=readme-ov-file#exception--error-handling
								
				Assertion::between($this->longitude,-180.0,180.0,'Longitude should be between -180 and 180');
			} catch(AssertionFailedException $e) {
				$e->getValue();
		}		
	
		// ...
	
	}

	// ...
}

