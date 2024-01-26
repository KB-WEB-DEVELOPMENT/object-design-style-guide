<?php

/*
Listing 3.26 - Here the conversion is done by the use of a special service : ExchangeService
compare with listings 3.23,3.24 and 3.25
*/

final class ExchangeService
{

	public function __construct(
		private ExchangeRateProvider $exchangeRateProvider
	) {}
	
	public function convert(Money $money,Currency $targetCurrency): Money
	{
		$exchangeRate = $this->exchangeRateProvider->getRateFor($money->currency(),$targetCurrency);

		return new Money($exchangeRate->rate()->applyTo($money->amount()),$targetCurrency);
	}
}
