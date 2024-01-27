<?php

/*
listing 9.15/9.16 (Refer to original problem, listing 9.14)
- This interface is implemented in ImportLogging file
- See how ImportNotifications is used as a dependency of Importer class in its constructor 
*/

interface ImportNotifications
{
	public function whenHeaderImported(string $file,array $header): void;

	public function whenLineImported(string $file,int $index): void;

	public function whenFileImported(string $file): void;
}
