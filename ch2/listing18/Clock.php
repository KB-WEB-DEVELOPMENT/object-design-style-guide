<?php

// System clock used to retrieve meetings at the current formatted time for a specific location
interface Clock
{
	public function currentTime(): DateTime;
}
