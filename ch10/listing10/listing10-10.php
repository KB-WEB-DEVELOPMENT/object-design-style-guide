<?php

/*
listing 10.10: The listing here highlights how any service (here ExchangeRateProvider) needs
an abstraction (ExchangeRate class here), that is what the service is "looking for".
We are missing in listing 10.10 an actual implementation of ExchangeRateProvider similar to
the file UpcomingMeetupDoctrineDbalRepository.php in listing 10.9.
*/

namespace Application\ExchangeRates;

interface ExchangeRateProvider
{
	public function getRateFor(Currency $from,Currency $to): ExchangeRate;
}

final ExchangeRate
{
	// ...
}
