<?php

/*
listing 3.36 & 3.37 :
Example of the use of a DTO (Data Transfer Object), ScheduleMeetup DTO
Populating the DTO and passing it to a service
*/

final class ScheduleMeetup
{
	public string $title;
	public string $datum;
}

/*
listing 3.36 & 3.37 :
Example of the use of a DTO (Data Transfer Object), ScheduleMeetup DTO
Populating the DTO and passing it to a service
*/

final class MeetupController
{
	public function scheduleMeetupAction(Request $request): Response
	{
		$formData = /* extracted from the $request body */;

		// creating a command object
		$scheduleMeetup = new ScheduleMeetup();
		
		$scheduleMeetup->title = $formData['title'];
		
		$scheduleMeetup->datum = $formData['date'];

		$this->scheduleMeetupService->execute($scheduleMeetup);

		// ...
	}
}
