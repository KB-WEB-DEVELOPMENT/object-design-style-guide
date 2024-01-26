<?php

/* 
listing 3.13 : Never do this with InvalidArgumentException. 
Never extend this class but rather test invalid argument exceptions
by analyzing the exception message. (see listings 3.14,3.15,3.16)
*/

final class SpecificException extends InvalidArgumentException
{
}


// somewhere else
try {
	// try to create the object
	} catch (SpecificException $exception) {
		// handle this specific problem in a specific way
	}
	
	
