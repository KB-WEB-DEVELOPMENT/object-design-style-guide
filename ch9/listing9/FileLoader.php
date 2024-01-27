<?php

/*
listing 9.9: Interface implemented by the ReplaceParametersWithEnvironmentVariables class
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
