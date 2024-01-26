<?php

// Passing the current time as method argument, no Clock dependency needed anymore
$meetupRepository = new MeetupRepository();
$meetupRepository->findUpcomingMeetups('Munich','2023-12-24 11:11:59');
