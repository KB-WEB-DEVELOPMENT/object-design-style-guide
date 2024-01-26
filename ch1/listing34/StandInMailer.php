<?php

namespace MyClasses;

// using a test double
final class StandInMailer implements Mailer
{
	// note : we assume the value object UserId class has been defined in the same namespace	
	public function sendWelcomeEmail(UserId $userId): void
	{
		// Do nothing
	}
}