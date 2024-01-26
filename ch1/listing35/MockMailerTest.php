<?php

namespace MyTests;

use MyClasses\Mailer;
use MyClasses\MockMailer;
use MyClasses\Foo;
// use MyClasses\UserId - not in book but must be there 

use PHPUnit\Framework\TestCase;

// using a simple mock to verify that a method has actually been called
final class MockMailerTest extends TestCase
{
	public function can_call_method_on_mock_mailer(): void
	{		
		$mockMailer = new MockMailer();

		$foo = new Foo($mockMailer);
		
		// $userId = new UserId(); --  see remark above

		$foo->someMethod($userId);

		assertTrue($mockMailer->hasBeenCalled());
	}
}
