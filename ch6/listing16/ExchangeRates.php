<?php

// Listing 6.16

interface ExchangeRates
{
	public function exchangeRateFor(Currency $from,Currency $to): ExchangeRate;
}