<?php

// Listing 3.6 : ReservationRequest class - see listing 3.7 for constructor arguments validation
final class ReservationRequest
{
	public function __construct(
		private int $numberOfRooms,
		private int $numberOfAdults,
		private int $numberOfChildren
	) {
		// ...
	}
}
