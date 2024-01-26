<?php

// A FileLogger Service with a depedency which needs a config value
final class FileLogger implements Logger
{
	public function __construct(
		private Formatter $formatter,
		private string $logFilePath,
		){}
		
	public function log(string $message): void
	{
		// ...
		
		$formattedMessage = $this->formatter->format($message);
	
		file_put_contents($this->logFilePath,$formattedMessage,FILE_APPEND);

		// ...
	}
}
