<?php

final class Order
{
	private array $linesArray;

	// idea : $linesArray = array(new Line(),new Line(),new Line(),new Line(),new Line());
	// multiple Line objects assigned to property $linesArray
	public function __construct(array ...$linesArray)
	{
		$this->linesArray = $linesArray;
	}
}
