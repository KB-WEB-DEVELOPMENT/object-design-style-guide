<?php

namespace MyClasses;

// using a simple mock to verify that a method has actually been called
class Foo
{
	public function __construct(
		private Mailer $mailer
	){}
	
	// note : we assume the Value Object UserId class has been defined in the same namespace
	public function someMethod(UserId $userId): void
	{
		$this->mailer->sendWelcomeEmail($userId);
	}
}
