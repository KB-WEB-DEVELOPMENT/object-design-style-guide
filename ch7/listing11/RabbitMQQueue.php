<?php

/*
Listing 7.11 (compare with listing 7.10) - We implement the new Queue abstraction
and pass to RabbitMQQueue publish() method in particular the new CanBePublished interface to accommodate all
types of events.
*/

namespace MyClasses;

final class RabbitMQQueue implements Queue
{
	// ...
	
	public function publish(CanBePublished $event,string $queueName,string $eventName,array $eventData): void
	{
		$this->rabbitMqConnection->publish(
			$event->queueName($queueName),
			$event->eventName($eventName),
			json_encode($event->eventData($eventData))
		);
	}
	
	// 
}