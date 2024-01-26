<?php

// System clock used to retrieve meetings in a fixed time format for a specific location
interface Clock
{
	public function currentTime(): DateTime;
}
