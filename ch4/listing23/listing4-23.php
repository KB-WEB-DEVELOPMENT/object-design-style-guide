<?php

/*
listing 4-23 : withDenominator() uses the validation logic in the constructor
install beberlei/assert package with: composer require beberlei/assert 
*/
namespace MyClasses;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class Fraction
{
	public function __construct(
		int $numerator,
		int $denominator
	){
		try {
				Assertion::notEq($this->denominator,0,'The denominator of a fraction cannot be zero');
			} 	  catch(AssertionFailedException $e) {
						$e->getValue();
						$e->getConstraints();
				  }			
	}
	
	public function withDenominator(int $newDenominator): Fraction
	{
		return new self($this->numerator,$newDenominator);
	}
}	
	
/*

Sample code : php unit test, testing for zero denominator failure

<?php
declare(strict_types=1);

use Assert\Assertion;
use Assert\AssertionFailedException;

use MyClasses/Fraction;

use PHPUnit\Framework\TestCase;

final class FractionTest extends TestCase
{
	public function can_not_have_denominator_zero(): void
    {
		$fraction1 = new Fraction(5,7);
		
		$fraction2 = $fraction1->withDenominator(0);
	
		$this->expectException(AssertionFailedException::class);
	}	
}	
*/
