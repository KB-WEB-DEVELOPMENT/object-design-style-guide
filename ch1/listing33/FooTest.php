<?php

namespace MyTests;

use MyClasses\Foo;

use PHPUnit\Framework\TestCase;

// Not a utility function as in the book but still testing for failures 
final class FooTest extends TestCase
{
	public function you_cannot_start_with_a_negative_number(): void
	{
		
		$foo = new Foo(-10);
		
		$this->expectException(InvalidArgumentException::class);
		$this->expectExceptionMessage('negative');
		
	}

	// ...

}