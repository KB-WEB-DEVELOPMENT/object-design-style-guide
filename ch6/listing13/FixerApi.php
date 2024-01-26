<?php
// listing 6.13

namespace MyClasses;

use MyClasses\ExchangeRate;
use MyClasses\Currency;

// responsible for calling the from() method on ExchangeRate 
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