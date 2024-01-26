<?php

// System clock used to retrieve meetings in a fixed time format for a specific location
$meetupRepository = new MeetupRepository(
						new FixedClock(
							new DateTime('2023-12-24 11:11:59')
						)
					);
					
$meetupRepository->findUpcomingMeetups('Munich');