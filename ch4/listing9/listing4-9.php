<?php

/*
Listing 4.9 : We force ourselves to make Year an immutable object.
If we want to change it, we create a new Year object in a specific method 
and make the change(s) to the object property / properties when this new object
is instantiated in this method. 
*/

final class Year
{
	public function __construct(
		private int $year
	){}
	
	public function next(): Year
	{
		return new self($this->year + 1);
	}
}

/*

$year1 = new Year(2019);

$year1->next();

var_dump($year1 == new Year(2020)); // 0 (false)

$year2 = new Year(2020);

$year3 = $year2->next();

$year4 = $year3;

var_dump($year4 === $year3); // 1 (true) 

echo $year3->year; // (int)2021

*/
