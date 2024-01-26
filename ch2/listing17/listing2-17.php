<?php

// repository dependendant on current time
final class MeetupRepository
{

	public function __construct(
		private Connection $connection
	)
	{}

	public function findUpcomingMeetups(string $area): array
	{
		$now = new \DateTime(/* various params for datetime formatting */);

		return $this->findMeetupsScheduledAfter($now,$area);	
	}
	
	public function findMeetupsScheduledAfter(DateTime $time,string $area): array
	{
		// ...
		
	}
}	
