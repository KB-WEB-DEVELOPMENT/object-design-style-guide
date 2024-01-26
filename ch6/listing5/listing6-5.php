<?php

/* 
Listing 6.5: For a query method, avoid having to return null. Throw 
an exception instead.
*/

public function getById($id): User
{
	$user = /* ... */;

	if (!($user instanceof User)) {
		throw UserNotFound->withId($id);
	}
	
	return $user;
}
