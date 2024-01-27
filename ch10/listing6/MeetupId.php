<?php

/*
listing 10.6: Example of an entity (Meetup) and how it is built with its related
value objects (Title,MeetupId,SchedulDate,UserId) and Meetup domain events (reschedule(),
cancel(),recordThat(),releaseEvents(),clearEvents()) 
All files available in the folder.
*/

final class MeetupId
{

	private function __construct(
		private string $meetupId
	){	
		# https://gist.github.com/Joel-James/3a6201861f12a7acf4f2
		$meetupId_valid_uuid_format = preg_match('/^[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}$/i',$this->meetupId) !== 1 ? false : true;
		
		if (!$meetupId_valid_uuid_format) {
			throw new InvalidArgumentException('"{$meetupId}" does not follow UUID format.');
		}	

	}
	
	public static function fromString(string $meetupId): MeetupId
	{
		return new self($meetupId);
	}
}