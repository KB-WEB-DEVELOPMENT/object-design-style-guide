<?php

/*
Listing 3.19: Showing how to extract new objects (Amount, Currency) 
to create composite values (Converter,Product)
*/

final class Converter
{
	public function convert(Amount $localAmount,Currency $localCurrency,Currency $targetCurrency): Amount
	{
		// ...
	}
}

final class Product
{
	public function setPrice(Amount $amount, Currency $currency): void
	{
		// ...	
	}
}

final class Amount
{
// ...
}

final class Currency
{
// ...
}
