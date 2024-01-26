	<?php

	/*
	Listing 3.27 - The DateTime class wraps a $date string  
	*/

	final class DateTimeObject
	{
		// php 8.0
		const string FORMAT = 'd-m-Y';
		private DateTime $newDateTimeObj;

		private function __construct()
		{}
		
		public static function fromString(string $date): DateTime|bool
		{

			$dateTimeObj = DateTime::createFromFormat(DateTimeObject::FORMAT,$date); // $date = '1-oct-2019'
			
			$newFormattedDateTimeObj = $dateTimeObj->format(DateTimeObject::FORMAT); // '01-10-2019' or false
			
			$this->newDateTimeObj = $newFormattedDateTimeObj; // '01-10-2019' or false

			return $this->newDateTimeObj;
		}
	}

	/*

	sample code:

	$formattedDateTime = (new DateTimeObject())->fromString('27-nov-2023'); // '27-11-2023'


	*/
