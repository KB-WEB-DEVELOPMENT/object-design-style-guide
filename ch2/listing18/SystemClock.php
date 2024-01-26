<?php

// System clock used to retrieve meetings at the current formatted time for a specific location
final class SystemClock implements Clock
{
	public function currentTime(): DateTime
	{
		return new \DateTime(/* add params for config if needed */);
	}
}