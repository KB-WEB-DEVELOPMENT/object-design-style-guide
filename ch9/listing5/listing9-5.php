<?php

/*
listing 9.5: ParameterLoader has the FileLoader interface as a dependency
*/

final class ParameterLoader
{
	
	public function __construct(
		private FileLoader $fileLoader
	){}
	
	public function load(string $filePath): array
	{
		
		if (!is_file($filePath)) {
			throw new RuntimeException('"{$filePath}" is either not a valid file path or file.');
		}
			
		$rawParameters = is_array($this->fileLoader->loadFile($filePath)) ? $this->fileLoader->loadFile($filePath) : array();

		return $rawParameters;
	}
}

/*

code implementation:

$loader = new ParameterLoader(new JsonFileLoader())->load(__DIR__ . '/parameters.json');

// Returns either an array with key value pairs or an empty array.

*/
