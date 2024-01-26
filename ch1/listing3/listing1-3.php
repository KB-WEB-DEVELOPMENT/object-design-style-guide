<?php

class Foo
{
	public function anObjectMethod(): void
	{
		//
	}
	
	public static function aStaticMethod(): void
	{
		//
	}		
}

$object1 = new Foo();
$object1->anObjectMethod(); // (new Foo)->anObjectMethod();
Foo::aStaticMethod();
