<?php

// Listing 6.1: Using a query method for information retrieval 
final class Counter
{
	private int count = 0;

	public function increment(): void
	{
		$this->count++;
	}
	
	public function currentCount(): int
	{
		return this->count;
	}
}

$counter = new Counter();

$counter->increment();

var_dump($counter->currentCount() == 1); // bool(true)
