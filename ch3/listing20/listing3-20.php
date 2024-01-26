<?php

/*
Listing 3.20: Because the two objects Amount and Currency are always found together, i.e:
a money amount is always expressed in a specific currency,we wrap them in a new type: the Money Class
*/

final class Money
{
	public function __construct(Amount $amount,Currency $currency)
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
