<?php

/*
listing 9.17 (compare with listing 9.3): Avoid doing this ... even if it works.
All changes : 
- ParameterLoader is not defined as final anymore
- The protected method loadFile is responsible for loading the file.
- It is protected, meaning it can be overriden by a subclass. 
- This whole class can be extended since it is not final, to deal with XML (listing 9.18)
- Allowing class extension should be avoided. Use Abstraction instead.
 
note : the Parameter class is defined in another file.
*/

class ParameterLoader
{
	public function load(string $filePath): array
	{
	
		if (!is_file($filePath)) {
			throw new RuntimeException('"{$filePath}" is either not a valid file path or file.');
		}
	
		$rawParameters = $this->loadFile($filePath);
		
		$parameters = [];

		if (!empty($rawParameters)) { 
			foreach ($rawParameters as $key => $value) {
				$parameters[] = new Parameter($key,$value);
			}
		}

		return $parameters;
	}
	
	protected function loadFile(string $filePath): array
	{
		return (!is_null(json_decode(file_get_contents($filePath),true))) ?  json_decode(file_get_contents($filePath),true) : array();
	}
	
}

/*

code implementation:

$loader = new ParameterLoader->load(__DIR__ . '/parameters.json');

// Returns either an array of instances of the Parameter class or an empty array.

*/
