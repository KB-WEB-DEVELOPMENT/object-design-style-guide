<?php

/*
Listing 7.10 (compare with listing 7.9) - This class is the implementation of the abstraction Queue we created.
*/

namespace MyClasses;

final class RabbitMQQueue implements Queue
{
	// ...
	
	public function publishUserPasswordChangedEvent(UserPasswordChanged $event): void
	{
		$this->rabbitMqConnection->publish(
			'user_events',
			'user_password_changed',
			json_encode(
				['user_id' => (string)$event->userId()]
			)
		);
	}
	
	// 
}