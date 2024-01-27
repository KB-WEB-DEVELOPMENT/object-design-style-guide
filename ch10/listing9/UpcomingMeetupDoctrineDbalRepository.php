<?php

/*
listing 10.9: The three files (UpcomingMeetup.php, UpcomingMeetupRepository.php and 
UpcomingMeetupDoctrineDbalRepository.php - all available in folder) highlight how a read model (UpcomingMeetup)
and real model repository (UpcomingMeetupRepository) work together. UpcomingMeetupDoctrineDbalRepository is
just the implementation of the read model repository interface.

The implementation of upcomingMeetups(Datetime $today) here (1) fetches data from the DB
and (2) create multiple instances of the UpcomingMeetup read model.
*/

namespace Infrastructure\ReadModel;

use Application\UpcomingMeetups\UpcomingMeetupRepository;
use Doctrine\DBAL\Connection;

final class UpcomingMeetupDoctrineDbalRepository implements UpcomingMeetupRepository
{
	
	public function __construct(
		private Connection $connection
	){}
	
	public function upcomingMeetups(DateTime $today): UpcomingMeetup
	{
		// ... including $today ...
		
		$rowsArray = $this->connection->/* some method to retrieve all meetups in the DB in an array of arrays */;

		return 	array_map(
					function ($singleArr) {
						$upcomingMeetup = new UpcomingMeetup();
						$upcomingMeetup->title = $singleArr['title'];
						$upcomingMeetup->datum =  $singleArr['datum'];

						return $upcomingMeetup;
					},
					$rowsArray
				);
	}
}