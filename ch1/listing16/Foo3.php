<?php

// Logger instance provided to Foo3 as a constructor argument
class Foo3
{
	private Logger $logger;

	public function __construct(Logger $logger)
	{
		$this->logger = $logger;
	}

	public function someMethod(): void
	{	
		$this->logger->debug('...');
	}
}