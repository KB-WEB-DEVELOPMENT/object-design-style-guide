<?php

/* 
Listing 6.10: use getters of Product to make a decision
*/

final class Product
{
	// ...
	
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

$percentageNetAmount = $product->discountPercentage()->applyTo($amount);

$fixedNetAmount = $amount->subtract($product->fixedDiscountAmount());

$netAmount = ($product->shouldDiscountPercentageBeApplied() == true) ? $percentageNetAmount : $fixedDiscountAmount;
