<?php

/*
listing 8.13: Unlike in previous listings, the receiveItems() method does not need
to call the markAsReceived() method on the purchase order found. See remarks.
*/

final class ReceiveItems
{
	public function __construct(
		private PurchaseOrderRepository $repository
	){}

	public function receiveItems(int $purchaseOrderId): void
	{

		// retrieve $purchaseOrder using the repository and the purchaseOrderId value object (see previous listings)

		$this>repository->save($purchaseOrder);
		
		// it can dispatch the newly received purchase order or all received purchase orders 
		
		$this->eventDispatcher->dispatchAll($purchaseOrder->recordedEvents());
	}
}
