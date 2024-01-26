<?php

/*
Listing 5.4 Example of an custom exception class with multiple specific named constructors
To be used only if needed. 
*/
final class CouldNotPersistObject extends RuntimeException
{
	public static function becauseDatabaseIsNotAvailable(): CouldNotPersistObject
	{
		return new self(/* ... */);
	}
	
	public static function becauseMappingConfigurationIsInvalid(): CouldNotPersistObject
	{
		return new self(/* ... */);
	}

	// ...
}
