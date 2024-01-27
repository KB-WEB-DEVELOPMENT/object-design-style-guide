<?php

/*
listing 10.9: The three files (UpcomingMeetup.php, UpcomingMeetupRepository.php and 
UpcomingMeetupDoctrineDbalRepository.php - all available in folder) highlight how a read model (UpcomingMeetup)
and real model repository (UpcomingMeetupRepository) work together. UpcomingMeetupDoctrineDbalRepository is
just the implementation of the read model repository interface.

UpcomingMeetup is a DTO (Data Transfer Object) to transfer data from the core application to the outside world.

*/

namespace Application\UpcomingMeetups;

final class UpcomingMeetup
{
	public string $title;
	public string $datum;
}
