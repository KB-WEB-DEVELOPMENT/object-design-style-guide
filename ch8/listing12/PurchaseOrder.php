<?php

/*
listing 8.12: Updated entity which tracks all received purchased orders using the new domain event 
PurchaseOrderReceived class.
*/

final class PurchaseOrder
{
	private int $purchaseOrderId;
	private int $productId;
	private int $orderedQuantity;
	private bool $wasReceived;
	private array $events = [];

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

		$this->events[] =   new PurchaseOrderReceived(
								$this->purchaseOrderId,
								$this->productId,
								$this->orderedQuantity
							);
	}

	public function recordedEvents(): array
	{
		return $this->events;
	}

}
