<?php

/* 
Listing 6.3: an alternative to listing 6.1, make the Counter object immutable,
increments() becomes a modifier method with a more declarative name : incremented()
*/
final class Counter
{
	private int count = 0;

	public function incremented(): Counter
	{
		$copy = clone $this;
	
		$copy->count++;

		return $copy;
	}
	
	public function currentCount(): int
	{
		return $this->count;
	}
}

var_dump((new Counter())->incremented()->currentCount() == 1); // bool(true)

var_dump((new Counter())->incremented()->incremented()->currentCount() == 2); // bool(true)

