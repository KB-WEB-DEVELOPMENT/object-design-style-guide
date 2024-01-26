<?php

// constructor arguments validation
final class ReservationRequest
{
	public function __construct(
		private int $numberOfRooms,
		private int $numberOfAdults,
		private int $numberOfChildren
	) {

		if ($this->numberOfRooms > ($this->numberOfAdults + $this->numberOfChildren)) {
			throw new InvalidArgumentException(
				'Number of rooms should not exceed number of guests'
			);
		}
	
		if ($this->numberOfAdults < 1) {
			throw new InvalidArgumentException(
				'numberOfAdults should be at least 1'
			);
		}
		
		if ($this->numberOfChildren < 0) {
			throw new InvalidArgumentException(
				'numberOfChildren should be at least 0'
			);
		}
	}
}
