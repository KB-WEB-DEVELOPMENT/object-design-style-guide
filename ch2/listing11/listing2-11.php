<?php

// value of $logFilePath set in log() method 
final class FileLogger implements Logger
{
	public function __construct(
		private ?string $logFilePath = null
	){}
	
	public function log(string $message): void
	{
		$logFilePath = (!is_null($this->logFilePath)) ? $this->logFilePath : '/tmp/app.log';
		
		file_put_contents($logFilePath,$message,FILE_APPEND);
	}
}
