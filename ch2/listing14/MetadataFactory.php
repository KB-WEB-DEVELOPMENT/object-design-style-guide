<?php

// Create and use a default configuration object with a default state for its properties
final class MetadataFactory
{
	public function __construct(Configuration $config): void
	{
		// ...
	}
}

/*

In another file:

Get values for $param1, $param2 and $param3

$metadataFactory = new MetadataFactory((new Configuration($param1,$param2,$param3))->createDefault());


*/


