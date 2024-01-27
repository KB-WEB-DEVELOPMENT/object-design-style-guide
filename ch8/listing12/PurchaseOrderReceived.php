<?php

/*
listing 8.12: To query the DB in a more efficient way, we create the domain event
PurchaseOrderReceived. It tracks the PurchaseOrder entity with property wasReceived set
to true. We use this domain event in the modified PurchaseOrder entity and save
all received purchased orders in the event array (see modified PurchaseOrder entity) 
*/ 

final class PurchaseOrderReceived
{
	public function __construct(
		private int purchaseOrderId,
		private int productId,
		private int receivedQuantity
	) {}

	public function productId(): int
	{
		return $this->productId;
	}
	
	public function receivedQuantity(): int
	{
		return $this->receivedQuantity;
	}
}
