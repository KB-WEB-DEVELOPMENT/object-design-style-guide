<?php

/*
listing 10.5: Example of a write model repository ("DoctrineOrmMeetupRepository")
which implements the interface below. See adjoined implementation file of the interface.
*/

namespace Domain\Model\Meetup;

interface MeetupRepository
{
	public function save(Meetup meetup): void;

	public function nextIdentity(): MeetupId;
	/**
	* @throws MeetupNotFound
	*/

	public function getById(MeetupId meetupId): Meetup
}
