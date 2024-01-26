<?php

// Listing 4.4 - Keeping an internal change log within the SalesInvoice entity
// see listings 4.1,4.2 and 4.3
final class SalesInvoice
{

	private array $events = [];

	private bool $finalized = false;

	public function finalize(): void
	{
		$this->finalized = true;

		$this->events[] = new SalesInvoiceFinalized(/* ... including  the $salesInvoiceId identifier ... */);
	}

	public function recordedEvents(): array
	{
		return $this->events;
	}
}


/* 

In a test scenario or inside a php unit test method: 

$salesInvoice = $SalesInvoice->create(// ... //);

$salesInvoiceId = $salesInvoice->salesInvoiceId;

$salesInvoice->finalize();

$this->assertEquals([new SalesInvoiceFinalized(// ... including specific $salesInvoiceId identifier ... //)],
                     salesInvoice->recordedEvents()
				   );

$salesInvoice = $this->salesInvoiceRepository->getBy($salesInvoiceId);

$salesInvoice->finalize(// ... //);

$this->salesInvoiceRepository->save($salesInvoice);

$this->eventDispatcher->dispatchAll($salesInvoice>recordedEvents());

*/
