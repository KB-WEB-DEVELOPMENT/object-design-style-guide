<?php

/*
Listing 4.10 (see listing 4.9): We keep a Year instance as a property
of the mutable object Journal and call the method next() on this property.
We also store the return value of next() on that property.
*/

final class Year
{
	public function __construct(
		private int $year
	){}
	
	public function next(): Year
	{
		return new self($this->year + 1);
	}
}

final class Journal
{
	private Year $currentYear;

	public function closeTheFinancialYear(): void
	{
		// ...
		
		$this->currentYear = $this->currentYear->next();
	}
}
