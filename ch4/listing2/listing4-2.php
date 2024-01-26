<?php

/*
Listing 4.2 : Example of an entity (SalesInvoice,listing 4.1),
uniquely identified by an identifier (SalesInvoiceId,listing 4.5) which is set when the
the entity is created. 
*/ 
final class SalesInvoice
{
	// the identifier SalesInvoiceId is shown in listing 4.5
	private SalesInvoiceId $salesInvoiceId;

	public static function create(SalesInvoiceId $salesInvoiceId): SalesInvoice
	{
		$object = new self();

		$object->salesInvoiceId = $salesInvoiceId;

		return $object;
	}
}
