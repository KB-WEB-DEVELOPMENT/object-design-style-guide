<?php

/*
listing 9.18: Avoid this. Just an example of how the class ParameterLoader (listing 9.17)
can be extended by the subclass XmlFileParameterLoader

note : the Parameter class is defined in another file.
*/

class XmlFileParameterLoader extends ParameterLoader
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
	
	// note that all steps could be split into various methods 
	protected function loadFile(string $filePath): array
	{
		 
		$xmlFileAsString = file_get_contents($filePath); 
		
		if (!is_string($xmlFileAsString)) {
			throw new RuntimeException('"{$filePath}" could not be converted into a string.');	
		}	
		 
		$xmlObject = simplexml_load_string($xmlFileAsString);

		if (!is_object($xmlObject)) {
			throw new RuntimeException('"{$xmlFileAsString}" could not be converted into an object.');	
		}		
   
		$jsonRepresentation = json_encode($xmlObject);

		if (empty($jsonRepresentation)) {
			throw new RuntimeException('The file matching the path file you provided is actually empty.');
		}

		if (!is_string($jsonRepresentation) || (is_array(json_decode($jsonRepresentation,true)) == false) {
			throw new RuntimeException('"{$xmlObject}" could not be encoded into a json representation.');
		}

		$arr = json_decode($jsonRepresentation,true);

		if (!is_array($arr)) {
			throw new RuntimeException('"{$jsonRepresentation}" could not be decoded into an associative array.');
		}

		return $arr;	
    }	
}
/*

code implementation:

$xmlLoader = new XmlFileParameterLoader->load(__DIR__ . '/parameters.xml');

// Returns an array of instances of the Parameter class.

*/
