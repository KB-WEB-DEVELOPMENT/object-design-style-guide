<?php

/*
Listing 8.7: Updated PurchaseOrder entity (compare with listing 8.6). All query methods (productId(),
orderedQuantity(),wasReceived()) are removed because they are taken care of by PurchaseOrderForStockReport.
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
	
	public function forStockReport(): PurchaseOrderForStockReport
	{
		return new PurchaseOrderForStockReport($this->productId,$this->orderedQuantity,$this->wasReceived);
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

}
