<?php

/*
Listing 6.19: Extract of a php unit test method not to test the conversion logic 
(see previous listings) but whether or not the connection to an external service works
*/

public function it_retrieves_the_current_exchange_rate(): void
{
	$exchangeRates = new FixerApi(new CurlHttpClient());

	$exchangeRate = $exchangeRates->exchangeRateFor(new Currency('USD'),new Currency('EUR'));

	// Verify if $exchangeRate value is the one we expect
}
