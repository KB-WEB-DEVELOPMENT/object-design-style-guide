<?php

// username and password are now together in Credentials object
final class Credentials
{
	public function __construct(
		private string $username,
		private string $password,
	){}

	public function username(): string
	{
		return $this->username;
	}
	
	public function password(): string
	{
		return $this->password;
	}
}