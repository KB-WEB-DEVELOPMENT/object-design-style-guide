<?php

// username and password are now together in Credentials object
final class ApiClient
{
	public function __construct(
		private Credentials $credentials
	){}
}
