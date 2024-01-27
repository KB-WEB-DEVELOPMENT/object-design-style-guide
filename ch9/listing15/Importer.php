<?php

/*
listing 9.15/9.16 (Refer to original problem, listing 9.14)
- ImportNotifications is used as a dependency of Importer class in its constructor 
- Concrete implementation of ImportNotifications is in file ImportLogging.php
*/

final class Importer
{

	public function __construct(
		private ImportNotifications notify
	){}

	public function import(string $csvDirectory): void
	{
		$finder = new Finder($csvDirectory);
		
		// Read through each file in the directory
		foreach ($finder->files() as $file) {

			// Store each file data in the array $lines
			$lines = /* numeric array, contains an index number as key and corresponding value either about 
 			            the file header or file content itself.
					 */;

			foreach ($lines as $index => $line) {
				
				if ($index == 0) {
					
					// Parse file header
					
					$header = /* ... obtained from $line */;
					
					$this->notify->whenHeaderImported($file,$header);
				
				} else {
					
					// Parse file content
					
					$data = /* ... obtained from $line ... */;

					$this->notify->whenLineImported($file,$index);
				}
			}
			
			$this->notify->whenFileImported($file);
		}
	}
}
