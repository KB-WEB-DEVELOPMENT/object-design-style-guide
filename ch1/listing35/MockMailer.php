<?php

namespace MyClasses;

// using a simple mock to verify that a method has actually been called
final class MockMailer implements Mailer
{
	private bool $hasBeenCalled = false;

	// note : we assume the Value Object UserId class has been defined in the same namespace
	public function sendWelcomeEmail(UserId $userId): void
	{
		$this->hasBeenCalled = true;
	}

	public function hasBeenCalled(): bool
	{
		return $this->hasBeenCalled;
	}
}