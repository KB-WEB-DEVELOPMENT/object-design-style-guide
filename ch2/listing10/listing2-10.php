<?php

// No need to provide a value for $logFilePath, default value provided
final class FileLogger implements Logger
{
	public string $logFilePath;
	
	public function __construct(string $logFilePath = '/tmp/app.log';) 
	{
		// ...
	}
	
	// ...
}

$logger = new FileLogger();
