<?php 

/*
Listing 3.24 : Here the exchangeRateProvider is not passed as a dependency. It is retrieved up front
and used to convert the amount. 
Compare with listing 3.23
*/

final class ExchangeRate
{
	public function __construct(
		Currency $from,
		Currency $to,
		Rate $rate
	) {/* ... */}

	public function convert(Amount $amount): Money
	{
		// ...
	}

	// 

}

/* 
Sample code:

$money = new Money(250,'EUR');

$targetCurrency = 'US DOLLARS';

$exchangeRate = $exchangeRateProvider->getRateFor($money->currency(),$targetCurrency);

$converted = $exchangeRate->convert($money->amount());

*/
