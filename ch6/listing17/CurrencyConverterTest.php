<?php 
declare(strict_types=1);

namespace MyTests;

/*
if needed:

use MyClasses\Money;
use MyClasses\Currency;
use MyClasses\CurrencyConverter;
use MyClasses\ExchangeRates;
use MyClasses\ExchangeRatesFake;
*/

use PHPUnit\Framework\TestCase;

final class CurrencyConverterTest extends TestCase
{
	public function it_converts_an_amount_using_the_exchange_rate(): void
	{
		$exchangeRates = new ExchangeRatesFake(new Currency('USD'),new Currency('EURO'),0.8);

		$currencyConverter = new CurrencyConverter($exchangeRates);

		$converted = $currencyConverter->convert(new Money(1000,new Currency('USD')));

		$this->assertEquals(new Money(800,new Currency('EUR')),$converted);
	}
}
