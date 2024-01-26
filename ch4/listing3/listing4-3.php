<?php

/*
Listing 4.2 : Example of an entity (SalesInvoice,listing 4.1) uniquely identified by an identifier (SalesInvoiceId,listing 4),
which is set when the entity is created. 
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

/*
Listing 4.3 : Retrieving the next identifier ($salesInvoiceId), create a new entity ($salesInvoice), modify it and save it.

$salesInvoiceId = $this->salesInvoiceRepository.nextIdentity();

$salesInvoice = (new SalesInvoice())->create($salesInvoiceId);

$this->salesInvoiceRepository->save($salesInvoice);

$salesInvoice = $this->salesInvoiceRepository->getBy($salesInvoiceId);

$salesInvoice->addLine(// ... //);

$this->salesInvoiceRepository->save($salesInvoice);


*/ 
