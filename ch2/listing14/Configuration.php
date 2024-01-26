<?php

// Create and use a default configuration object with a default state for its properties
final class Configuration
{
	public function __construct(
		private string $param1,
		private string $param2,
		private  string $param3,
		){}

	public function createDefault(): array
	{
		$param1 = /* do something with $this->param1 */
		$param2 = /* do something with $this->param2 */
		$param3 = /* do something with $this->param3 */
		
		return array($param1,$param2,$param3);
	}

}

/*

In another file:

Get values for $param1, $param2 and $param3

$metadataFactory = new MetadataFactory((new Configuration($param1,$param2,$param3))->createDefault());


*/
