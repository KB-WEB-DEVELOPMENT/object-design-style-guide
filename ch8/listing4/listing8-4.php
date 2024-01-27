<?php

/*
listing 8.4: (all files relevant for StockReportController available in listing 8.3)
- Example of a controller which uses the repository to just read (and not write) information
from all saved data in the PurchaseOrder entity.  The execute() method reads data from the 
entity and returns a formatted response.
*/

final class StockReportController
{
	
	public function __construct(
		private PurchaseOrderRepository $repository
	){}
	
	public function execute(Request $request): Response
	{
		
		$allPurchaseOrders = $this->repository->findAll();

		$stockReport = [];

		foreach ($allPurchaseOrders as $purchaseOrder) {

			if (!($purchaseOrder->wasReceived())) {
				continue;
			}
			
			if (!isset($stockReport[$purchaseOrder->productId()])) {
				
				$stockReport[$purchaseOrder->productId()] = 0;
			}
			
			$stockReport[$purchaseOrder->productId()] += $purchaseOrder->orderedQuantity;
		}
		
		return new JsonResponse($stockReport);
	}
}
