<?php

/*
Listing 8.8: We rewrite the ReceiveItems service (compare with listing 8.3). The only
change is the creation of the value object (VO) PurchaseOrderId which
allows us to retrieve the purchase order id without having to query the PurchaseOrder entity
through the repository directly. 
*/

final class ReceiveItems
{
	public function __construct(
		private PurchaseOrderRepository $repository
	){}

	public function receiveItems(int $purchaseOrderId): void
	{

		$purchaseOrder = $this->repository->getById(PurchaseOrderId::fromInt($purchaseOrderId));

		$purchaseOrder->markAsReceived();

		$this>repository->save($purchaseOrder);
	}
}
