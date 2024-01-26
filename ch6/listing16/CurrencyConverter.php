<?php

/*
Listing 6.16 : We do not inject FixerApi directly into CurrencyConverter but instead
inject just the ExchangeRate Interface dependency into CurrencyConverter's constructor. 
*/

final class CurrencyConverter
{
	public function __construct(
		private ExchangeRates $exchangeRates
	){}

	// ...

	private function exchangeRateFor(Currency $from,Currency $to): ExchangeRate
	{
		return $this->exchangeRates->exchangeRateFor($from,$to);
	}
}
