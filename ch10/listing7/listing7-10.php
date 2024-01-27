<?php

/*
listing 10.7 (refer to listing 10.6) - this listing highlights how 
how an application service (RescheduleMeetupService) uses an event dispatcher (EventDispatcher)
to forward a domain event (i.e: recordedEvents() of the Meetup class) to other application services called event listeners.
The event listeners themselves can either call other services or perform some specific tasks 
(ex: send a notification email for example). 
Look at listing 10.8 to see the skeleton of an event listener.
*/

final class RescheduleMeetupService
{

	public function __construct(
		// ...
		private EventDispatcher $dispatcher
	){}
		
	public function reschedule(MeetupId $meetupId, /* ... */): void
	{
		// ...
		
		$meetup = /* ... */;

		$meetup->reschedule(/* ... */);
		
		$this->dispatcher->dispatchAll($meetup->recordedEvents());
	}
}
