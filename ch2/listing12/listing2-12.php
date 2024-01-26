<?php

// Logger not set during instantiation but by calling setLogger() 
final class BankStatementImporter
{
	private ?Logger $logger;

	public function __construct()
	{
	}

	public function setLogger(Logger $logger): void
	{
		$this->logger = $logger;
	}
		// ...
}

$importer = new BankStatementImporter();
/* ...
$logger = ....
*/
$importer->setLogger($logger);
