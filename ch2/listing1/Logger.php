<?php

//  A FileLogger Service
interface Logger
{
	public function log(string $message): void;
}