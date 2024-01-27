<?php

/*
listing 9.4: Implementing FileLoader interface
*/

final class JsonFileLoader implements FileLoader
{
	public function loadFile(string $filePath): array
	{
		if (!is_file($filePath)) {
			throw new RuntimeException('"{$filePath}" is either not a valid file path or file.');
		}	
		
		$result = (!is_null(json_decode(file_get_contents($filePath),true))) ? json_decode(file_get_contents($filePath),true) : array();

		
		if (empty($result)) {
			throw new RuntimeException('Decoding "{$filePath}" resulted in an empty array.');
		}
	
		return $result;
	}
}