<?php
// listing 6.13

namespace MyClasses;

use MyClasses\FixerApi;
use MyClasses\Money;
use MyClasses\Currency;
use MyClasses\ExchangeRate;

// uses instances of FixerApi and ExchangeRate to get converted money amount
final class CurrencyConverter
{
	public function __construct(
		private FixerApi $fixerApi
	){}
	
	public function convert(Money $money,Currency $to): Money
	{
		$exchangeRate = $this->fixerApi->exchangeRateFor($money->currency(),$to);
	
		return $money->convert($exchangeRate);
	}
}
