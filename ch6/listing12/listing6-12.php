<?php
/* 
Listing 6.12: Incomplete example. The problem highlighted by this listing is
that the method does too much, does not check possible network failures,
error responses, invalid json, modified response structure, approximate precision
for the float value, etc ... (see listings 6.13 to listing 6.19 for improvements)
*/

final class CurrencyConverter
{
	public function convert(Money $money,Currency $to): Money
	{
		$httpClient = new CurlHttpClient();

		/*
			retrieve access key from environment variable:
			$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
			$dotenv->load();
			$key = $_ENV['ACCESS_KEY'];
		*/
		
		$m = strval($money->currency());
		$s = strval($to);
		
		$url = 'http://data.fixer.io/api/latest?access_key=';

		$url .= $key;

		$url .= '&base=' . $m; 

		$url .= '&symbols=' . $s; 

		$response = $httpClient->get($url);
		
		$decoded = json_decode($response->getBody());

		$rate = (float)$decoded->rates[strval($to)];

		return $money->doSomething($to,$rate);
	}
}
