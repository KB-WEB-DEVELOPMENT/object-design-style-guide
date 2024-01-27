<?php

/*
listing 9.10: Interface implemented by CachedFileLoader
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
