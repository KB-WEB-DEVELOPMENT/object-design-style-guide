<?php

/*
Listing 7.11 We create a new interface to accommodate all types of events. 
This interface is passed as a dependency to the publish() method of the Queue interface.
*/

namespace MyClasses;

interface CanBePublished
{
	public function queueName(string $queueName): string;
	
	public function eventName(string $eventName): string;
	
	public function eventData(array $eventData): array;
}
