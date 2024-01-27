<?php

/*
Listing 8.7: Updated PurchaseOrder entity (compare with listing 8.6). All query methods (productId(),
orderedQuantity(),wasReceived()) are removed because they are taken care of by PurchaseOrderForStockReport.
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
