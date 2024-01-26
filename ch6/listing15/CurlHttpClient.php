<?php

namespace MyClasses;

use MyClasses\Money
use MyClasses\Currency;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;

final class CurlHttpClient implements HttpClient
{

	// ...

	public function get(Money $money,Currency $to): Response
	{

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
		
		$httpClient = new HttpClient();
		
		$response = $httpClient->request('GET',$url);
		
		return $response;
			
	}

	// ...
}
