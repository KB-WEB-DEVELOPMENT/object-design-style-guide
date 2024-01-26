<?php

// Listing 6.16 : FixerApi implements the ExchangeRate Interface, it acts as a "service". 

final class FixerApi implements ExchangeRates
{
	
	public function __construct(
		private HttpClient $httpClient;
	{}
	
	public function exchangeRateFor(Currency $from,Currency $to): ExchangeRate
	{
		$response = $this->httpClient->get(/* ... */);

		$decoded = json_decode($response->getBody());

		$rate = (float)$decoded->data()->rate;

		return (new ExchangeRate())->from($from,$to,$rate);
	}
}