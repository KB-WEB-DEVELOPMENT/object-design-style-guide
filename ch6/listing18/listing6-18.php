<?php

/*
Listing 6.18: The ExchangeRatesStub is a stub, an alternative 
to the ExchangeRatesFake test double (see listing 6.17). Unlike the test double,
this stub returns just one fixed hardcoded value which can also be used in 
the CurrencyConverterTest (see listing 6.17) 
*/

final class ExchangeRatesStub
{
	public function exchangeRateFor(Currency $from,Currency $to): ExchangeRate
	{
		return (new ExchangeRate())->from($from,$to,1.2);
	}
}
