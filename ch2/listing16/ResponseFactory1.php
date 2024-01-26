<?php

/*
JsonEncoder wraps the json_encode() call
see changes from ResponseFactory1.php to ResponseFactory2.php 
*/
final class ResponseFactory1
{
	public function createApiResponse(array $data): Response
	{
		return new Response(
			json_encode($data,JSON_PRETTY_PRINT | JSON_FORCE_OBJECT | JSON_THROW_ON_ERROR);
		);
	}
}