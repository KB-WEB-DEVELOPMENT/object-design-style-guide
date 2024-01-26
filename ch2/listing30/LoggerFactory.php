<?php

// We use a LoggerFactory to create the log file directory.
// This is just temporary solution leading to the forthcoming real solution: listing 2.31

final class LoggerFactory
{
	public function createFileLogger(string $logFilePath): FileLogger
	{

		if (!is_file($logFilePath)) {
	
			$logFileDirectory = dirname($logFilePath);

			if (!is_dir($logFileDirectory)) {
				mkdir($logFileDirectory, 0777, true);
			}
			
			touch($logFilePath);
		}

		return new FileLogger($logFilePath);
	}
}