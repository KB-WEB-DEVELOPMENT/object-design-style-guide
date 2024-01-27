<?php

/*
listing 10.8 (refer to listing 10.7) - Skeleton of an event listener (NotifyGroupMembers).
The name reflects what is going to be done.
The event here is MeetupRescheduled.
The method name (whenMeetupRescheduled()) should reflect the reason why the event listener
is taking place.  
*/
final class NotifyGroupMembers
{
	public function whenMeetupRescheduled(MeetupRescheduled $event): void
	{
		/*	
		* Send an email to group members using the information from
		* the event object.
		*/
	}
}
