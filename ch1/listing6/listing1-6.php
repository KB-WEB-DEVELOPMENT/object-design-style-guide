<?php

class Foo
{
	public static function create(): Foo
	{
		return new self(); // return new static() works in this case too ...
	}		
}

$object1 = (new Foo)::create(); // $object1 is a new Foo instance 
