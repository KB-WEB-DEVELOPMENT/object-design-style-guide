<?php

namespace MyClasses;

use MyClasses\Money
use MyClasses\Currency;
use MyClasses\ExchangeRate;

final class FixerApi
{
	public function __construct(
		private HttpClient $httpClient
	){}
	
	public function exchangeRateFor(Currency $from,Currency $to): ExchangeRate
	{
		$response = $this->httpClient->get($from,$to);

		$decoded = json_decode($response->getBody());

		$rate = (float)$decoded->rates[strval($to)];

		return ExchangeRate->from($from,$to,$rate);
	}
}