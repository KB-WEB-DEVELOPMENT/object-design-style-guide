<?php

// using separate constructor arguments for username and password
final class ApiClient
{
	public function __construct(
		private string $username,
		private string $password,
	){}
}
