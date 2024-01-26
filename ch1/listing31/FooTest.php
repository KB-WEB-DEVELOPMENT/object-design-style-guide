<?php

namespace MyTests;

use MyClasses\Foo;

use PHPUnit\Framework\TestCase;

// simple class with unit tests
final class FooTest extends TestCase
{
	public function you_can_start_with_a_given_number(): void
	{
		
		$foo = new Foo(10);

		assertEquals(10,$foo->someNumber());
	}
	
	public function you_can_increment_the_number(): void
	{

		$foo = new Foo(10);
		$foo->increment();

		assertEquals(11,$foo->someNumber());
	}
}