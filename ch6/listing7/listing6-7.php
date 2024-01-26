<?php

/* 
Listing 6.7: Instead of null, we choose to return an empty list 
*/

public function eventListenersForEvent(string $eventName): array
{
	 return (!isset($this->listeners[$eventName])) ? [] : $this->listeners[$eventName];
}
