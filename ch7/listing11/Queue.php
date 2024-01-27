<?php

/*
Listing 7.11 (compare with the Queue interface in listing 7.10) We modify the Queue
interface so that it accommodates all types of events, not just a user password change.
In particular, we pass to the Queue publish() method the new CanBePublished interface as a dependency.  
*/

namespace MyClasses;

interface Queue
{
	public function publish(CanBePublished $event,string $queueName,string $eventName,array $eventData): void;
}
