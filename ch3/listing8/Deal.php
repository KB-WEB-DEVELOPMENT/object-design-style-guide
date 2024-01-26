<?php

/*
Solution : Listing 3.10 here
Check previous listings 3.6 and listing 3.7
The idea is to remove superfluous constructor arguments
*/
final class Deal
{

	public function __construct(
		private int $amountToFirstParty,
		private int $amountToSecondParty
	) {
		if ($this->amountToFirstParty <= 0) {
			throw new InvalidArgumentException(/* ... */);
		}

		if ($this->amountToSecondParty <= 0) {
			throw new InvalidArgumentException(/* ... */);
		}
	}

	public function totalAmount(): int
	{
		return $this->amountToFirstParty + $this->amountToSecondParty;
	}
}
