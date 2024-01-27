<?php

/*
listing 9.4: Interface implemented in the file JsonFileLoader (see other file)

*/

interface FileLoader
{
	public function loadFile(string $filePath): array
}
