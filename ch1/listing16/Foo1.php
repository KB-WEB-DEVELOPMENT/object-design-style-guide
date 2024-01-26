<?php

// Logger instantiated when needed 
class Foo1
{
	public function someMethod(): void
	{
		$logger = new Logger();
		
		$logger->debug('...');
	}
}
