<?php

namespace MyTests;

use MyClasses\Foo;

use PHPUnit\Framework\TestCase;

// Testing for failures
final class FooTest extends TestCase
{	
	public function you_cannot_start_with_a_negative_number(): void
	{
		try {				
				new Foo(-10);
				
				throw new \RuntimeException('The constructor should have failed');
		
		} 	catch (!($this->expectException(\InvalidArgumentException::class))) {
				
					throw new \RuntimeException('We expected a different type of exception');

				}

				$this->expectExceptionMessage('negative');
	}

	// ...

}