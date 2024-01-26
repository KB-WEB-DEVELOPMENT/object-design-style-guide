<?php

// System clock used to retrieve meetings in a fixed time format for a specific location
final class FixedClock implements Clock
{
	public function __construct(
		public DateTime $now;
	){}
	
	public function currentTime(): DateTime
	{
		return $this->now;
	}
}