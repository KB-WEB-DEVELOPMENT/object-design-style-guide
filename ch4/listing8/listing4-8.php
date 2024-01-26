<?php

/*
Listing 4.8: Avoid building non entity object such as Appointment that are mutable.
Here, calling the reminderTime() method in between two calls to the time() method
yields two different answers. 
*/

final class Appointment
{

	public function __construct(
		private DateTime $dt
	){}
	
	public function time(): string
	{
		return this->dt->format('h:s');
	}
	
	public function reminderTime(): string
	{
		$oneHourBefore = '-1 hour';
		
		$reminderTime = $this->dt->modify($oneHourBefore);

		return $reminderTime->format('h:s');
	}
}

/*

Sample code:

$appointment = new Appointment(new DateTime('2024-01-01 12:00:00'));

$time = $appointment->time(); // '12:00'

$reminderTime = $appointment->reminderTime();

$time = appointment->time(); // '11:00'

*/
