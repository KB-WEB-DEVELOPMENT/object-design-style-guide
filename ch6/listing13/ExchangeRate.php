<?php
// listing 6.13

namespace MyClasses;

use MyClasses\Currency;

// Method from() called by FixerApi class
final class ExchangeRate
{
	public function __construct(
		private Currency $from,
		private Currency $to,
		private float $rate
	){		
		// ...	
	}
	
	public static function from(Currency $from,Currency $to,float $rate): ExchangeRate
	{
		//  do something with $from,$to,$rate
		
		return ExchangeRate::(/* modified $from,$to,rate */);
	}
}