<?php

// System clock used to retrieve meetings at the current formatted time for a specific location
final class MeetupRepository
{
	// ...
	public function __construct(
		protected Clock $clock,
		/* ... */
	){}
	
	public function findUpcomingMeetups(string $area): array
	{
		$now = $this->clock->currentTime();
		
		// ...
	}
}