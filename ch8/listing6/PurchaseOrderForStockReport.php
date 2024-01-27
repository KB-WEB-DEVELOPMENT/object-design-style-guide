<?php

/*
Listing 8.6: used by PuchaseOrder and StockReportController (both available in listing 8.6)
*/

final class PurchaseOrderForStockReport
{

	public function __construct(
		private int $productId,
		private int $orderedQuantity,
		private bool $wasReceived
	){}
	
	public function productId(): ProductId
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
