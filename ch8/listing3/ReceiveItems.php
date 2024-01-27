<?php

/*
listing 8.3:
The ReceiveItems class (1) retrieves a specific purchase order with 
the help of PurchaseOrderRepository and (2) changes the state of the
the PurchaseOrder entity (precisely, sets the property markAsReceived to true).  
*/
final class ReceiveItems
{
	public function __construct(
		private PurchaseOrderRepository $repository
	){}

	public function receiveItems(int $purchaseOrderId): void
	{
		$purchaseOrder = $this->repository->getById($purchaseOrderId);

		$purchaseOrder->markAsReceived();

		$this->repository->save($purchaseOrder);
}
}