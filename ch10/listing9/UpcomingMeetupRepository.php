<?php

/*
listing 10.9: The three files (UpcomingMeetup.php, UpcomingMeetupRepository.php and 
UpcomingMeetupDoctrineDbalRepository.php - all available in folder) highlight how a read model (UpcomingMeetup)
and real model repository (UpcomingMeetupRepository) work together. UpcomingMeetupDoctrineDbalRepository is
just the implementation of the read model repository interface.

*/

namespace Application\UpcomingMeetups;

interface UpcomingMeetupRepository
{
	
	public function upcomingMeetups(DateTime $today): UpcomingMeetup
}