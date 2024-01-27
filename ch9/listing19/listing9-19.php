<?php

/*
listing 9.19 : Slight improvement to listing 9.17, this here is the blueprint
of the so called TEMPLATE method.
- ParameterLoader is the parent method, it is defined as an abstract class to be extended by any specific param loader classes.
- We want its loadFile() method, an abstract protected method, to be extended by any specific param loader classes.
- All other ParameterLoader methods (for us just load()) are final and hence cannot be overriden any param loader classes.
*/

abstract class ParameterLoader
{
	final public function load(string $filePath): array
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
	
	abstract protected function loadFile(string $filePath): array;	
}
