<?php

/* 
Listing 6.11 (Better alternative than listing 6.10): use the method calculateNetAmount()
*/

final class Product
{
	// ...
	public function calculateNetAmount(Money $amount): Money
	{
		if ($this->shouldDiscountPercentageBeApplied() == true) {
			return $this->discountPercentage()->applyTo($amount);
		}
		
		return $amount->subtract($this->fixedDiscountAmount());
	}
	
	public function shouldDiscountPercentageBeApplied(): bool
	{
		// ...
	}
	
	public function discountPercentage(): Money
	{
		// ...
	}
	
	public function fixedDiscountAmount(): Money
	{
	}
	
	// ...
}

// Client side:

$product = new Product(/* ....*/);

$amount = new Money(/* ... */);

$netAmount = $product->calculateNetAmount($amount);
