<?php

// An implementation of the Logger interface that does nothing
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

/*
in another file : 

$importer = new BankStatementImporter(new NullLogger());

*/
