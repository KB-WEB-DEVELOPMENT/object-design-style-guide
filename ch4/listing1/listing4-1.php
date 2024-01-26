<?php

/*
Listing 4.1 : Typical blueprint of an entity, e.g. "SalesInvoice", which gives 
information to the developer about the business domain.
*/ 
final class SalesInvoice
{
/**
* @var Line[]
*/
	private array $lines = [];

	private bool $finalized = false;

	public static function create(/* ... */): SalesInvoice
	{
		// ...
	}
	
	public function addLine(/* ... */): void
	{
		if ($this->finalized) {
			throw new RuntimeException(/* ... */);
		}	
	
		$this->lines[] = Line.create(/* ... */);
	}
	
	public function finalize(): void
	{
		$this->finalized = true;
		
		// ...
	}
	
	public function totalNetAmount(): Money
	{
		// ...
	}
	
	public function totalAmountIncludingTaxes(): Money
	{
		// ...
	}
}
