<?php

// We use a LoggerFactory to create the log file directory.
// This is just temporary solution leading to the forthcoming real solution: listing 2.31

final class FileLogger implements Logger
{
	public function __construct(
		private string $logFilePath
	){}

	public function log(string $message): void
	{
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
		
		touch($this->logFilePath);
	}
}
