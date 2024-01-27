<?php

/*
listing 10.6: Example of an entity (Meetup) and how it is built with its related
value objects (MeetupId,Title,SchedulDate,UserId) and Meetup domain events (reschedule(),
cancel(),recordThat(),releaseEvents(),clearEvents()) 
All files available in the folder.
*/

namespace Domain\Model\Meetup;

final class Meetup
{
	private array events = [];
	private MeetupId $meetupId;
	private Title $title;
	private ScheduledDate $scheduledDate;
	private UserId $userId;

	private function __construct()
	{
	}
	
	public static function schedule(MeetupId $meetupId,Title $title,ScheduledDate $scheduledDate,UserId $userId): Meetup
	{
		$meetup = new self();
		
		$meetup->meetupId = $meetupId;
		
		$meetup->title = $title;

		$meetup->scheduledDate = $scheduledDate;

		$meetup->userId = $userId;

		$meetup->recordThat(new MeetupScheduled($meetupId,$title,$scheduledDate,$userId));
		
		return $meetup;
}

	public function reschedule(ScheduledDate $scheduledDate): void
	{
		// ...
		
		$this->recordThat(new MeetupRescheduled($this->meetupId,$scheduledDate));
		
		// ...
	}
	
	public function cancel(): void
	{
		// ...
	}
		
	private function recordThat(object $event): void
	{
		$this->events[] = $event;
	}
	
	public function releaseEvents(): array
	{
		return $this->events;
	}
	
	public function clearEvents(): void
	{
		$this->events = [];
	}
}
