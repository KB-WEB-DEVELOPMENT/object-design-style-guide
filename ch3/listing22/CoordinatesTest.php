<?php 
declare(strict_types=1);

namespace MyTests;

use Assert\Assertion;
use Assert\AssertionFailedException;

use MyClasses/Coordinates;

use PHPUnit\Framework\TestCase;

# Listing 3.22
final class CoordinatesTest extends TestCase
{
    // ...
	
	public function testLatitudeDomainInvarianceMessage(): void
    {
        
		 $mock = $this->getMockBuilder(Coordinates::class)
					  ->setConstructorArgs([90.1,0.0])
					  ->getMock();
		
		# https://github.com/beberlei/assert?tab=readme-ov-file#list-of-assertions
		# https://github.com/beberlei/assert?tab=readme-ov-file#exception--error-handling
		
		$this->expectException(AssertionFailedException::class);
		$this->expectExceptionMessage('Latitude should be between -90 and 90');
	}

	public function testLongitudeDomainInvarianceMessage(): void
    {
        
		 $mock = $this->getMockBuilder(Coordinates::class)
					  ->setConstructorArgs([0.0,180.1])
					  ->getMock();
					  
		# https://github.com/beberlei/assert?tab=readme-ov-file#list-of-assertions
		# https://github.com/beberlei/assert?tab=readme-ov-file#exception--error-handlin
		
		$this->expectException(AssertionFailedException::class);
		$this->expectExceptionMessage('Longitude should be between -180 and 180');
    
	}

    // ...

}
