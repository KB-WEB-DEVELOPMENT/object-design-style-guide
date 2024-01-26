<?php

/*
Listing 7.9 (consider looking at listings 7.9/7.10 and 7.11 to understand)

Example of basic publishing on a queue. Here, rabbitMqConnection publish() method
connects to RabbitMQ server to publish a password change related message.
We need to define abstractions for commands that cross system boundaries (see next listings).
*/

final class SendMessageToRabbitMQ
{
	// ...

	public function whenUserChangedPassword(UserPasswordChanged $event): void
	{
		$this->rabbitMqConnection->publish(
			'user_events',
			'user_password_changed',
			json_encode(
				['user_id' => (string)$event->userId()]
			)
		);
	}
}
