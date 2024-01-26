<?php

/* 
Here, relying on the type system "int" is not enough.
It works but $minimumLevel is a config flag and is supposed to be greater than 0
See listing2.35
*/

final class Alerting
{
	public function __construct(
		private int $minimumLevel
	){}
}

// $alerting = new Alerting(-99999999); -> works but bad
