<?php

// DO NOT do this,  only assign properties in constructor !
// Look at listing 2-29,2-30,2-31 and 2-32
final class FileLogger implements Logger
{

	public function __construct(private string $logFilePath)
	{
		$logFileDirectory = dirname($logFilePath);
	
		if (!is_dir($logFileDirectory)) {
			mkdir($logFileDirectory, 0777, true);
		}
		
		touch($logFilePath);

		$this->logFilePath = $logFilePath;
	}

	// ...
}
