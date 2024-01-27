<?php

/*
Listing 8.6: (Refer to listing 8.5) We add the method forStockReport() to the PurchaseOrder entity.
- This method is used by the updated StockReportController in listing 8.6.
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
	
	/* added method */
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
