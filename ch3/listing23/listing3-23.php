<?php 

/*
Listing 3.23 : Injecting a dependency (the exchange rate provider here) as a method argument
compare with listing 3.24
*/

final class Money
{

	public function __construct(
		private Amount $amount,
		private Currency $currency
	){}
	
	public function convert(ExchangeRateProvider $exchangeRateProvider,Currency $targetCurrency): Money
	{
		$exchangeRate = $exchangeRateProvider->getRateFor($this->currency,$targetCurrency);

		return $exchangeRate->convert($this->amount);
	}
}
