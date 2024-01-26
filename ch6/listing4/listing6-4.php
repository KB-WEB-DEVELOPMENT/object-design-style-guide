<?php

/* 
Listing 6.4: Avoid this at all costs.
A query method should have a single-type return value
(either string or bool but not both)
*/

public function isValid(string emailAddress): string|bool
{
	if (/* ... */) {
		return 'Invalid email address';
	}

	return true;
}
