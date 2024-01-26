<?php

/* 
Listing 5.3: Example of a "postcondition check" (see listing 5.1)
We use beberlei/assert library. Installation: composer require beberlei/assert
*/

// above class method:
use Assert\Assertion;
use Assert\AssertionFailedException;

// within the class
public function someVeryComplicatedCalculation(): int
{
	// ...
	
	$result = /* ... */;
	
	try {
		Assertion::greaterThan($result,0,'The result should be bigger than zero.');
	
	// We do not expect this to happen - just a "postcondition check"
	} catch(AssertionFailedException $e) {
		$e->getValue();
		$e->getConstraints();
	}

	return $result;
}
