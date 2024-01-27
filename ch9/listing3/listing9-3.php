<?php

/*
listing 9.3: The listing shows how instances of the Parameter class containing constructor
arguments can be built.

note : the Parameter class is defined in another file.
*/

final class ParameterLoader
{
	public function load(string $filePath): array
	{
	
		if (!is_file($filePath)) {
			throw new RuntimeException('"{$filePath}" is either not a valid file path or file.');
		}
	
		$rawParameters = (!is_null(json_decode(file_get_contents($filePath),true))) ?  json_decode(file_get_contents($filePath),true) : array();
		
		$parameters = [];

		if (!empty($rawParameters)) { 
			foreach ($rawParameters as $key => $value) {
				$parameters[] = new Parameter($key,$value);
			}
		}

		return $parameters;
	}
}

/*

code implementation:

$loader = new ParameterLoader->load(__DIR__ . '/parameters.json');

// Returns either an array of instances of the Parameter class or an empty array.

*/
