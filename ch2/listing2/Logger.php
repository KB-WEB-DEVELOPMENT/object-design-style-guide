<?php

// A FileLogger Service with a depedency which needs a config value
interface Logger
{
	public function log(string $message): void;
}