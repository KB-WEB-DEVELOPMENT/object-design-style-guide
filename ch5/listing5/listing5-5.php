<?php

/*
Listing 5.5: Custom exception class which receives data it uses.
*/
final class CouldNotFindStreetName extends RuntimeException
{
	// ...
	
	public static function withPostalCode(PostalCode $postalCode): CouldNotFindStreetName
	{
		// ...
		
		return new self($postalCode,/* ... */);
		
	}

	// ...
}
