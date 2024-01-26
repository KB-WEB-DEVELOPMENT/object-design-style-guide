<?php

// System clock used to retrieve meetings in a fixed time format for a specific location
final class MeetupRepository
{
	// ...
	public function __construct(
		public Clock $clock,
		/* ... */
	){}
	
	public function findUpcomingMeetups(string $area): array
	{
		$now = $this->clock->currentTime();
		
		// ...
	}
}