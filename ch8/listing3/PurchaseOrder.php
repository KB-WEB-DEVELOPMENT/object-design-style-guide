<?php

/*
listing 8.3:
The ReceiveItems class (1) retrieves a specific purchase order with 
the help of PurchaseOrderRepository and (2) changes the state of the
the PurchaseOrder entity (precisely, sets the property markAsReceived to true).  
*/

final class PurchaseOrder
{
	private int $purchaseOrderId;
	private int $productId;
	private int $orderedQuantity;
	private bool $wasReceived;

	private function __construct()
	{
	}
	
	public static function place(int $purchaseOrderId,int $productId,int $orderedQuantity): PurchaseOrder
	{
		$purchaseOrder = new self();

		$purchaseOrder->productId = $productId;

		$purchaseOrder->orderedQuantity = $orderedQuantity;

		$purchaseOrder->wasReceived = false;

		return $purchaseOrder;
	}
	
	public function markAsReceived(): void
	{
		$this->wasReceived = true;
	}
	
	public function purchaseOrderId(): int
	{
		return this->purchaseOrderId;
	}
	
	public function productId(): int
	{
		return $this->productId;
	}
	
	public function orderedQuantity(): int
	{
		return $this->orderedQuantity;
	}
	
	public function wasReceived(): bool
	{
		return $this->wasReceived;
	}
}
