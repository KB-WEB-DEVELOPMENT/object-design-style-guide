<?php

/*
listing 9.15/9.16 (Refer to original problem, listing 9.14)
- Implementation of ImportNotifications interface
- See how ImportNotifications is used as a dependency of Importer class in its constructor 
*/

final class ImportLogging implements ImportNotifications
{
	
	public function __construct(
		private Logger $logger
	){}
	
	public function whenHeaderImported(string $file,array $header): void
	{
		$this->logger->debug('Debug Info: Imported header "' . (string)$header . '" in file "{$file}" ...');
	}

	public function whenLineImported(string $file,int $index): void
	{
		$this->logger->debug('Debug Info: Imported line at index "{$index}" in file "{$file}" ...');
	}
	
	public function whenFileImported(string $file): void
	{
		$this->logger->debug('Debug Info: Imported file "{$file}" ...');
	}
}
