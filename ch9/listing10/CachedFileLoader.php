<?php

/*
listing 9.10: Example of file loader which makes use of a cache implementation system.
*/

final class CachedFileLoader implements FileLoader
{	
	private array $cache = [];

	public function __construct(
		private FileLoader $realLoader
	){}
	
	public function loadFile(string $filePath): array
	{	
	   return (isset($this->cache[$filePath]) ? $this->cache[$filePath] : $this->realLoader->loadFile($filePath);
	}
}

/*

Code implementation:

$loader = new CachedFileLoader(new JsonFileLoader());

// The call will be forwarded to JsonFileLoader. An array is returned.
$arr1 = $loader->loadFile('parameters.json'); 

// The call will NOT be forwarded to JsonFileLoader. The cache is called. An array identical to $arr1 is returned.
$arr2 = $loader->loadFile('parameters.json'); 				
					
*/