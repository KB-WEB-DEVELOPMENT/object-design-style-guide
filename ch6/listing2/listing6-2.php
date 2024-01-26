<?php

/* 
Listing 6.2: Avoid this at all costs!
This breaks the CQS (Command Query Separation) principle: a method
should be either a command or a query, not both.
 
*/
final class Counter
{
	private int count = 0;

	public function increment(): void
	{
		return $this->count++;
	}
}
