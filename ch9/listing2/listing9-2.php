<?php

/*
listing 9.2: (see listing 9.1) Expanding on previous listing by making the Filelogger filename
configurable in the class constructor.
*/

final class FileLogger
{
	public function __construct(
		private string $filePath
	){}

	public function log(mixed $data,int $flags = 0,?resource $context = null): int|false
	{

		return is_null($context) ?  file_put_contents($this->filepath,$data,$flags) : file_put_contents($this->filepath,$data,$flags,$context);
	}
}

/*

code implementation:

$logger = new FileLogger('some/path/test.txt');

$opts = array('http'=>array('method'=>"GET",'header'=>"Content-Type: text/xml; charset=utf-8");

$context = stream_context_create($opts);

$logger->log('Kâmi Barut-Wanayo',FILE_APPEND,$context); 

// returns either the number of bytes written to test.txt or false on failure	


*/
