<?php

/*
Listing 3.29 - Protecting Domain Invarian through the private constructor
Note that the package beberlei/assert must be installed through composer with:
composer require beberlei/assert
Alternatively, I can create my own assertion functions.
*/

use Assert\Assertion;
use Assert\AssertionFailedException;

final class DecimalValue
{
	private function __construct(
		int $value,
		int $precision
	){
		try {
			Assertion::greaterOrEqualThan($this->precision,0);
		} catch(AssertionFailedException $e) {
			$e->getValue();
			$e->getConstraints();
		  }
	}
	
	public static function fromInt(int $value,int $precision): DecimalValue
	{
		return new DecimalValue($value,$precision);
	}
	
	public static function fromFloat(float $value,int $precision): DecimalValue
	{
		return new DecimalValue((int)round($value * pow(10,$precision)),$precision);
	}
	
	public static function fromString(string $value): DecimalValue
	{
		$result = preg_match('/^(\d+)\#(\d+)/',$value,$matches);

		if ($result == 0) {
			throw new InvalidArgumentException(/* ... */);
		}
		
		$wholeNumber = $matches[1];
		
		$decimals = $matches[2];
		
		$valueWithoutDecimalSign = (int)($wholeNumber . $decimals);

		return new DecimalValue($valueWithoutDecimalSign,strlen($decimal));
	}
}
 
