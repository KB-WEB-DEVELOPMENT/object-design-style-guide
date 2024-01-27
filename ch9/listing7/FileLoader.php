<?php

/*
listing 9.7: Interface implemented by the MultipleLoaders file
*/

interface FileLoader
{
	/**
	* ...
	*
	* @throws CouldNotLoadFile
	*/
	public function loadFile(string $filePath): array
}
