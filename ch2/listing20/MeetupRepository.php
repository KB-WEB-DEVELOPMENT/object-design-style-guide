<?php

// Passing the current time as method argument, no Clock dependency needed anymore
final class MeetupRepository
{
	public function __construct(
	/* ... */
	){
	 /* ... */		
	}
	
	public function findUpcomingMeetups(string $area,Datetime $now): array
	{		
		// ...
	}
}