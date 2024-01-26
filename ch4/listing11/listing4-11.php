<?php

/*
Listing 4.11 : With the help of the constructor, we use the method modifier plus() 
on the immutable object Integer to return a modified copy of the Integer object  
*/

final class Integer
{
	public function __construct(
		private int $integer
	){}
	
	public function plus(Integer $other): Integer
	{
		return new self($this->integer + $other->integer);
	}
}
