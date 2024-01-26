<?php

// real solution: LoggerFactory takes care of everything FileLogger needs
final class LoggerFactory
{
	public function createFileLogger(string $logFilePath): FileLogger
	{
		if (!is_file($logFilePath)) {
			$logFileDirectory = dirname($logFilePath);

			if (!is_dir($logFileDirectory)) {
				mkdir($logFileDirectory,0777, true);
			}
			
			touch($logFilePath);
		}
		
		if (!is_writable($logFilePath)) {
			throw new InvalidArgumentException(
				'Log file path "{logFilePath}" should be writable'
			);
		}
		
		return new FileLogger($logFilePath);
	}
}