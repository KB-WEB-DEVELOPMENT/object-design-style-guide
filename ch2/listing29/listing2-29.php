<?php

// If needed, directory created in a specific method 
// Better than listing 2-28 but not good enough, also look at 2-30,2-31 and 2-32
final class FileLogger implements Logger
{
	public function __construct(
		private string $logFilePath
	){}
	
	public function log(string message): void
	{
		// check here if directory exists
		$this->ensureLogFileExists();
		
		// ...
	}
	
	private function ensureLogFileExists(): void
	{
		if (is_file($this->logFilePath)) {
			return;
		}
	
		$logFileDirectory = dirname($this->logFilePath);

		if (!is_dir($logFileDirectory)) {
			mkdir($logFileDirectory, 0777, true);
		}
		
		touch(this->logFilePath);
	}
}
