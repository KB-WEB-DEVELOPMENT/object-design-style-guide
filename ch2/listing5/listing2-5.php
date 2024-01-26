<?php

// simplified implementation of a service locator
final class ServiceLocator

{
	private array $services;

	public function __construct()
	{
		$this->services = [
					'logger' => new FileLogger(/* any number of services here */)
				];
	}
	
	public function get(string $identifier): object
	{
		if (!isset($this->services[$identifier])) {
			throw new LogicException('Unknown service: ' . $identifier);
		}

		return $this->services[$identifier];
	}
