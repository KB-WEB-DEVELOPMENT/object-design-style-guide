<?php

/*
listing 9.14 (compare with listings 9.15 and 9.16) - This listing is unclear and overcomplicated
because 3 different event listeners are triggered. The overall goal of these 3 event listeners could be 
for example to write some debug information about the 3 events.
We need some abstraction (see solution in listing 9.15 and 9.16)
*/

final class Importer
{
	public function __construct(
		private EventDispatcher $dispatcher
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
					
					$this->dispatcher->dispatch(new HeaderImported($file,$header));
				
				} else {
					
					// Parse file content
					
					$data = /* ... obtained from $line ... */;

					$this->dispatcher->dispatch(new LineImported($file,$index));
				}
			}
			
			$this->dispatcher->dispatch(new FileImported($file));
		}
	}
}
