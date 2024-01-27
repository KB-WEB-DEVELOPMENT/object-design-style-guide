<?php

/*
listing 10.4: Similar to listing 10.3. Here, we use the DTO (Data Transfer Object)
ScheduleMeetup and transfer it to the application service.
*/

namespace Application\ScheduleMeetup;

use Domain\Model\Meetup\Meetup;
use Domain\Model\Meetup\MeetupRepository;
use Domain\Model\Meetup\ScheduleDate;
use Domain\Model\Meetup\Title;
use Domain\Model\User\UserId;

// the DTO which is passed to the application service
final class ScheduleMeetup
{
	public string $title;
	public string $datum;
}

final class ScheduleMeetupService
{
	public function __construct(
		private MeetupRepository $meetupRepository
	){}
	
	public function schedule(ScheduleMeetup $command,UserId $currentUserId): MeetupId
	{
		$meetup = (new Meetup())->schedule(
				$this->meetupRepository->nextIdentity(),
				(new Title())->fromString($command->title),
				(new ScheduleDate())->fromString($command->datum),
				$currentUserId
		           );

		$this->meetupRepository->save($meetup);

		return $meetup->meetupId();
	}
}
