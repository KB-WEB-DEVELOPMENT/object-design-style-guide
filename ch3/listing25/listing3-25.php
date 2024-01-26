<?php


/*
Listing 3.25 : We pass the exchange rate as opposed to the exchange rate service provider 
Compare with listings 3.23,listing 3.24

Note that the package beberlei/assert must be installed through composer with:
composer require beberlei/assert
Alternatively, I can create my own assertion functions.

*/

use Assert\Assertion;

final class Money
{
	public function __construct(
		private Amount $amount,
		private Currency $currency
	){}
	
	public function convert(ExchangeRate $exchangeRate): Money
	{
		# https://github.com/beberlei/assert/tree/master?tab=readme-ov-file#list-of-assertions
		
		Assertion::same(this->currency,$exchangeRate->fromCurrency());
		
		$targetCurrencyAmount = $exchangeRate->rate()->applyTo(this->amount);
		
		return new Money($targetCurrencyAmount,$exchangeRate->targetCurrency());
	}
	
}

/* 
Sample code:

$money = new new Money(250,'EUR');

$exchangeRate = $exchangeRateProvider->getRateFor($money->currency(),$targetCurrency);

$converted = $money->convert($exchangeRate);

*/
