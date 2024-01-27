<?php

/*
listing 10.3: Typical example of an application service (has its own specific characteristics)
Basic idea: it performs only one task.
*/

namespace Application\ScheduleMeetup;

use Domain\Model\Meetup\Meetup;
use Domain\Model\Meetup\MeetupRepository;
use Domain\Model\Meetup\ScheduleDate;
use Domain\Model\Meetup\Title;
use Domain\Model\User\UserId;

final class ScheduleMeetupService
{
	public function __construct(
		private MeetupRepository $meetupRepository
	){}
	
	public function schedule(string $title,string $date,UserId $currentUserId): MeetupId
	{
		$meetup = (new Meetup())->schedule(
							        $this->meetupRepository->nextIdentity(),
							        (new Title())->fromString($title),
							        (new ScheduleDate())->fromString($date),
							        $currentUserId
		);

		$this->meetupRepository->save($meetup);

		return $meetup->meetupId();
	}
}
