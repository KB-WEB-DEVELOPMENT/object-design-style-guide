<?php 
declare(strict_types=1);

namespace MyTests;

use MyClasses/Coordinates;

use PHPUnit\Framework\TestCase;

final class CoordinatesTest extends TestCase
{
    // ...
	
	public function testLatitudeDomainInvarianceMessage(): void
    {
        
		 $mock = $this->getMockBuilder(Coordinates::class)
					  ->setConstructorArgs([90.1,0.0])
					  ->getMock();
		
		$this->expectException(InvalidArgumentException::class);
		$this->expectExceptionMessage('Latitude should be between -90 and 90');
	}

	public function testLongitudeDomainInvarianceMessage(): void
    {
        
		 $mock = $this->getMockBuilder(Coordinates::class)
					  ->setConstructorArgs([0.0,180.1])
					  ->getMock();
		
		$this->expectException(InvalidArgumentException::class);
		$this->expectExceptionMessage('Longitude should be between -180 and 180');
    
	}

    // ...

}

