<?php

// System clock used to retrieve meetings at the current formatted time for a specific location

$meetupRepository = new MeetupRepository(new SystemClock());
$meetupRepository->findUpcomingMeetups('Munich');