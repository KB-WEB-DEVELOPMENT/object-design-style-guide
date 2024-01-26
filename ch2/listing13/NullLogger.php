<?php

// An implementation of the Logger interface that does nothing
final class NullLogger implements Logger
{
	public function log(string $message): void
	{
		// Do nothing
	}
}

/*
in another file : 

$importer = new BankStatementImporter(new NullLogger());

*/
