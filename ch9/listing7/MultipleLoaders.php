<?php

/*
listing 9.7: This class implements the FileLoader interface and wraps all FileLoaders
*/

final class MultipleLoaders implements FileLoader
{
	public function __construct(
		private array loaders
	){
		foreach ($this->loaders as $loader) {
			if (!($loader instanceof FileLoader)) {
				throw new RuntimeException('"{$loader}" is not an instance of FileLoader.');		
			}	
		}			
	}
	
	public function loadFile(string $filePath): array
	{
		
		if (!is_file($filePath)) {
			throw new RuntimeException('"{$filePath}" is either not a valid file path or file.');
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