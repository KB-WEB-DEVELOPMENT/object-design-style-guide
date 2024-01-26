<?php
/*
listing 6.14 : identical to listing 6.13
see improvement on listing 6.15 by adding an HttpClient interface 
and having the FixerApi class use it.
*/
namespace MyClasses;

use MyClasses\ExchangeRate;
use MyClasses\Currency;

final class FixerApi
{
	public function exchangeRateFor(Currency $from,Currency $to): ExchangeRate
	{
		$httpClient = new CurlHttpClient();
		
		$response = httpClient->get($from,$to,/* ... */);
	
		$decoded = json_decode($response->getBody());

		$rate = (float)$decoded->rates[strval($to)];

		return (new ExchangeRate())->from($from,$to,$rate);
	}
}
