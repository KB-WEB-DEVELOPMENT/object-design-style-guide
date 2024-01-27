<?php

/*
listing 8.5: As the name suggests, this class is created to generate the stock report,
as a read model.It is used:
(1) Inside the PurchaseOrder Entity as a method return type (listing 8.6)
(2) Through (1), inside the execute() method of the rewritten StockReportController (listing 8.6)
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

