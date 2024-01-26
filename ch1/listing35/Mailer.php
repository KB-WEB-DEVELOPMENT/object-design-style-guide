<?php

namespace MyClasses;

// using a simple mock to verify that a method has actually been called
interface Mailer
{
	// note : we assume the Value Object UserId class has been defined in the same namespace
	public function sendWelcomeEmail(UserId $userId): void;
}
