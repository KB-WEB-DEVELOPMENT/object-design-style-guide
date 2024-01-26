<?php

/*
listing 4-22 : Making sure that a modifier method always results in a valid object (that is d > 0)
install beberlei/assert package with: composer require beberlei/assert 
*/
namespace MyClasses;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class TotalDistanceTraveled
{
	private int $totalDistance = 0;

	public function add(int $distance): TotalDistanceTraveled
	{
		try {
				Assertion::greaterOrEqualThan($distance,0,'the distance must be greater or equal to zero.');
			} 	  catch(AssertionFailedException $e) {
						$e->getValue();
						$e->getConstraints();
				  }

		$copy = clone $this;

		$copy->totalDistance += $distance;

		return $copy;
	}
}

/*

Sample code : php unit test, testing for positive distances only 

<?php
declare(strict_types=1);

use Assert\Assertion;
use Assert\AssertionFailedException;

use MyClasses/TotalDistanceTraveled;

use PHPUnit\Framework\TestCase;

final class TotalDistanceTravelledTest extends TestCase
{
	
	public function can_only_add_positive_distance(): void
    {

		$totalDistanceTravelled = new TotalDistanceTraveled();

		$totalDistanceTravelled->add(-10); 
	
		$this->expectException(AssertionFailedException::class);
	
	}
	
}	
*/
