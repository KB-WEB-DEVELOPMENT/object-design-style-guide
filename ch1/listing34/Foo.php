<?php

namespace MyClasses;

// using a test double
class Foo
{
	public function __construct(
		private Mailer $mailer
	){}
}