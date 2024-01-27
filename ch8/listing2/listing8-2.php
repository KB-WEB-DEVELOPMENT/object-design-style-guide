<?php

/*
Listing 8.2: Example of a typical entity containing "read methods" [productId(),orderedQuantity(),wasReceived(),
purchaseOrderId()] as well as "write methods" [place(),markAsReceived()].
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
