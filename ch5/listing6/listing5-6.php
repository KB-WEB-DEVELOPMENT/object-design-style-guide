<?php

/*
Listing 5.6: 
Custom exception class - Give the constructor a name which clearly indicates the reason for failure
*/
final class InvalidTargetPosition extends LogicException
{
	public static function becauseItIsOutsideTheMap(/* ... */): InvalidTargetPosition
	{
		// ...
	}
}
