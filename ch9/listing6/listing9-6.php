<?php

/*
listing 9.6: The only difference with listing 9.5 is the file loader used. See code implementation.
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

$loader = new ParameterLoader(new XmlFileLoader())->load(__DIR__ . '/parameters.xml');

// Returns either an array with mutiple key value pairs or an empty array.

*/
