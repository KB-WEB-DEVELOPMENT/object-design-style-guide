<?php

/* 
Listing 6.6 (an alternative to listing 6.5): Return a "null object"
NullUser extends User.
*/

public function getById($id): User
{
	$user = /* ... */;

	if (!($user instanceof User)) {
		return NullUser($id);
	}
	
	return $user;
}
