<?php

/*
listing 9.8: Similar to listing 9.7 with added security checks. See implementation.
*/

final class MultipleLoaders implements FileLoader
{
	public function __construct(
		private array loaders
	){
		foreach ($this->loaders as $type => $loader) {
			if (!($loader instanceof FileLoader)) {
				throw new RuntimeException('"{$loader}" is not an instance of FileLoader.');		
			}
			if (!is_string($type)) {
				throw new RuntimeException('"{$loader}" array contains non string keys.');		
			}	
		}		
	}
	
	public function loadFile(string $filePath): array
	{
		
		if (!is_file($filePath)) {
			throw new RuntimeException('"{$filePath}" is either not a valid file path or file.');
		}
		
		$extension = pathinfo($filePath, PATHINFO_EXTENSION);

		if (!isset($this->loaders[$extension])) {
			throw new RuntimeException('There is no loader for file extension "{$extension}".');
		}	
		
		
		$lastException = null;

		foreach ($this->loaders as $loader) {
			try {
					return $loader->loadFile($filePath);
			} 	catch (Exception $e) {
					$lastException = $e;
				}
		}
		
		throw new RuntimeException('None of the file loaders was able to load file "{$filePath}"',$lastException);
	}
}

/*

code implementation:

$parameterLoader = 	new ParameterLoader(
						new MultipleLoaders([
							'json' => new JsonFileLoader(),
							'xml' => new XmlFileLoader()
						]);
					);
					
$parameterLoader->load('parameters.json'); // Returns either an array with multiple key value pairs or an empty array.

$parameterLoader->load('parameters.xml'); //  Returns either an array with multiple key value pairs or an empty array.

$parameterLoader->load('parameters.yml'); //  'RuntimeException: There is no loader for file "extension yml."'

*/