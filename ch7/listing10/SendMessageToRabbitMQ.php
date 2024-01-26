<?php

/*
Listing 7.10 (compare with listing 7.9) - This class is the event listener which 
must publish a message to the queue when a UserPasswordChanged event occurs. We
use the new abstraction Queue as a dependency.
*/

namespace MyClasses;

final class SendMessageToRabbitMQ
{
	public function __construct(
		private Queue $queue
	){}
	
	public function whenUserPasswordChanged(UserPasswordChanged $event): void
	{
		$this->queue->publishUserPasswordChangedEvent($event);
	}
}