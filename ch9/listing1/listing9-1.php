<?php

/*
listing 9.1: Making the behavior of a constructor method (here log()) configurable by adding arguments
*/

final class FileLogger
{
	public function log(string $filepath,mixed $data,int $flags = 0,?resource $context = null): int|false
	{

		return is_null($context) ?  file_put_contents($filepath,$data,$flags) : file_put_contents($filepath,$data,$flags,$context);
	}
}

/*

code implementation:

$logger = new FileLogger();

$opts = array('http'=>array('method'=>"GET",'header'=>"Content-Type: text/xml; charset=utf-8");

$context = stream_context_create($opts);

$logger->log('some/path/test.txt','Kâmi Barut-Wanayo',FILE_APPEND,$context); 

// returns either the number of bytes written to test.txt or false on failure	


*/
