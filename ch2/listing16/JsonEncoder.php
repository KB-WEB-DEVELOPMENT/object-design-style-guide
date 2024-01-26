<?php

/*
JsonEncoder wraps the json_encode() call
see changes from ResponseFactory1.php to ResponseFactory2.php 
*/
final class JsonEncoder
{
/**
* @throws JsonException
*/
	public function encode(array $data): string
	{
		try {
				return json_encode($data,JSON_PRETTY_PRINT | JSON_FORCE_OBJECT | JSON_THROW_ON_ERROR);
			
			}  	catch (\JsonException $exception) {
						echo $exception->getMessage();
				}
	}
}
