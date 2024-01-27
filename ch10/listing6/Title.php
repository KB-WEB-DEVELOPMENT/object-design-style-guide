<?php

/*
listing 10.6: Example of an entity (Meetup) and how it is built with its related
value objects (Title,MeetupId,SchedulDate,UserId) and Meetup domain events (reschedule(),
cancel(),recordThat(),releaseEvents(),clearEvents()) 
All files available in the folder.
*/

final class Title
{

	private function __construct(
	private string $title
	){
		if (empty($this->title)) {
			throw new InvalidArgumentException('"{$title}" cannot be an empty string.');
		}
	}
	
	public static function fromString(string $title): Title
	{
		return new self($title);
	}
	
	public function abbreviated(string ellipsis = '...'): string
	{
		//  implementation where the title is shortened for example
	}
}