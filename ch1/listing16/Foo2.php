<?php

// Logger Instance fetched from known location
class Foo2
{
	public function someMethod(): void
	{
		$logger = $serviceLocator->getLogger();
		
		$logger->debug('...');
	}
}