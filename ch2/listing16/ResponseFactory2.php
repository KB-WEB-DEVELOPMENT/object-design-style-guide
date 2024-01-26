<?php

/*
JsonEncoder wraps the json_encode() call
see changes from ResponseFactory1.php to ResponseFactory2.php 
*/
final class ResponseFactory2
{
	public function __construct(
		private JsonEncoder $jsonEncoder
	){}
	
	public function createApiResponse($data): Response
	{
		return new Response(
			$this->jsonEncoder->encode($data);
		);
	}
}