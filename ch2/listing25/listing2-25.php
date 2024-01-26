<?php

// avoid at all costs : calling a method which modifies the behavior of a class
final class Importer
{
	private bool $ignoreErrors = true;

	public function ignoreErrors(bool $ignoreErrors): void
	{
		$this->ignoreErrors = $ignoreErrors;
	}
		
	// ...
}


$importer = new Importer(); // no idea if property is set to true or false here

// ...

importer.ignoreErrors(false); // may not be clear down the road if the property is set to false

// ...
