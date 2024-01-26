<?php

/*
Listing 4.6 : Need to install beberlei/assert package with composer :
composer require beberlei/assert
- no change to the the value object
- return a new Quantity object when instantiated or when two quantities are added
- a value object (ex : Quantity) is an immutable object that wraps primitive-type values
 */
use Assert\Assertion;
use Assert\AssertionFailedException;

final class Quantity
{
	private function __construct(
		private int $quantity,
		private int $precision
	) {}
	
	public static function fromInt(int $quantity,int $precision): Quantity
	{
		return new self($quantity,$precision);
	}
	
	public function add(Quantity $other): Quantity
	{
		try {
			Assertion::same($this->precision,$other->precision,'The two quantities precisions must be equal');
		} catch(AssertionFailedException $e) {
			$e->getValue();
			$e->getConstraints();
		}

		return new self($this->quantity + $other->quantity,$this->precision);
	}
}

/*
sample code:

$originalQuantity = new Quantity((int)0,(int)0)->fromInt(1500,2); 

// $originalQuantity --> quantity1 = 1500, precision1 = 2 -->  basically equal to 15.00

$newQuantity = $originalQuantity->add(Quantity->fromInt(500,2));  

// $newQuantity --> quantity2 = 1500 +  500 = 2000, precision2 = 2 --> basically equal to 20.00


*/
