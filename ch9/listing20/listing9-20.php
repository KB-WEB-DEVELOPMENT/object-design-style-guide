<?php

/*
listing 9.20: This is the continuation of listing 9.19, our ParameterLoader implementing the template method pattern.
The only changes we make here:
- ParameterLoader is not abstract anymore and we make this class final (cannot be extended)
- Instead of having loadFile() as an abstract protected method, we inject the File loader into ParameterLoader constructor
and use the FileLoader own loadFile() method in ParameterLoader load() method.
 
*/

final class ParameterLoader
{
	
	public function __construct(
		private FileLoader $fileLoader
	){}	
	
	final public function load(string $filePath): array
	{
	
		if (!is_file($filePath)) {
			throw new RuntimeException('"{$filePath}" is either not a valid file path or file.');
		}
	
		$rawParameters = $this->fileLoader->loadFile($filePath);
		
		$parameters = [];

		if (!empty($rawParameters)) { 
			foreach ($rawParameters as $key => $value) {
				$parameters[] = new Parameter($key,$value);
			}
		}

		return $parameters;
	}

}
