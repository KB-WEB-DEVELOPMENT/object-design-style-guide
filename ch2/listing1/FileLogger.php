<?php

//  A FileLogger Service
final class FileLogger implements Logger
{
	public function __construct(
		private Formatter $formatter
	){}

	public function log(string $message): void
	{
		$formattedMessage = $this->formatter->format($message);
		
		// ...
	}
}
