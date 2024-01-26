<?php

namespace MyClasses;

use MyClasses\Money
use MyClasses\Currency;

use Symfony\Component\HttpFoundation\Response;

interface HttpClient
{
	public function get(Money $money,Currency $to): Response;
}
