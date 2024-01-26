<?php

/*
Listing 6.17 : 
(1) We implement the ExchangeRates Interface by creating the ExchangeRatesFake "test double" 
(similar to the FixerApi class in listing 6.16)
(2) We use the ExchangeRatesFake "service" as a dependency in the CurrencyConverter service to test CurrencyConverter.
*/ 

namespace MyClasses;

final class ExchangeRatesFake implements ExchangeRates
{
	private array $rates = [];

	public function __construct(
		private Currency $from,
		private Currency $to,
		private float $rate
	) {

		$this->rates[strval($from)][strval($to)] = ExchangeRate->from($from,$to,$rate);
	}

	public function exchangeRateFor(Currency $from,Currency $to): ExchangeRate
	{
		if (!(isset($this->rates[strval($from)][strval($to)]))) {
			throw new RuntimeException('Could not determine exchange rate from ' . strval($from) . ' to ' . strval($to));
		}

		return $this->rates[strval($from)][strval($to)];
	}
}

