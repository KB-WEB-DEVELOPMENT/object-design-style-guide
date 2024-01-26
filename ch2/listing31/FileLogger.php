<?php

// real solution: LoggerFactory takes care of everything FileLogger needs
final class FileLogger implements Logger
{
	/**
	* @param string logFilePath Absolute path to a log file that
	* already exists and is writable.
	*/
	public function __construct(
		private string $logFilePath
	){}
	
	// may be other methods required here ...
}
