<?php

namespace MyTests;

use MyClasses\Mailer;
use MyClasses\StandInMailer;
use MyClasses\Foo;

use PHPUnit\Framework\TestCase;

// Testing a test double
final class DoubleTestingMailerTest extends TestCase
{
	public function can_use_a_test_double(): void
	{		
		$standInMailer = new StandInMailer();

		$foo = new Foo($standInMailer);
		
		$this->assertInstanceOf(Foo::class,$foo);
	}
}
