<?php

/*
Listing 7.10 (compare with listing 7.9) We create the abstraction Queue.
*/

namespace MyClasses;

interface Queue
{
	public function publishUserPasswordChangedEvent(UserPasswordChanged $event): void;
}
