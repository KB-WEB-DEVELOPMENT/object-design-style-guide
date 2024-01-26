<?php

// Logger as an optional constructor argument 
final class BankStatementImporter
{
	public function __construct(
		private ?Logger $logger = null
	){}

	public function import(string $bankStatementFilePath): void
	{
		/*
		
		1. Import bank statement file
		2. Occasionally log some information for debugging 
		
		*/
	
	}
}

// Object instantiated without a Logger instance 
$importer = new BankStatementImporter();

/*

 Better import method:

	public function import(string $bankStatementFilePath): void
	{
		if (is_null($this->logger)) {
			return;
		} else {
				// 1. Import bank statement file
				// 2. Occasionally log some information for debugging 
		}	
	}

*/
