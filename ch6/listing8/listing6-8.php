<?php

/* 
Listing 6.8: Method findOneByType() mixes return types.
We write a new method that returns either a Page object
or null. We deal with the null case by throwing an exception. 
*/

public function getOneByType(PageType $type): Page
{
	$page = $this->findOneByType($type);
	
	if (!($page instanceof Page)) {
		throw PageNotFound->withType($type);
	}
	
	return $page;
}
