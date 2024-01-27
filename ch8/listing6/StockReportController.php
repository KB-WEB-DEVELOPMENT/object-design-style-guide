<?php

/*
Listing 8.7: Updated PurchaseOrder entity (compare with listing 8.6). All query methods (productId(),
orderedQuantity(),wasReceived()) are removed because they are taken care of by PurchaseOrderForStockReport.
*/

final class StockReportController
{
	public function __construct(
		private PurchaseOrderRepository $repository
		){}
		
	public function execute(Request $request): Response
	{

		$allPurchaseOrders = $this->repository->findAll();

		$purchaseOrdersForStockReport = array_map(
						  function (PurchaseOrder $purchaseOrder) {
							return $purchaseOrder->forStockReport();
						  }, $allPurchaseOrders);

		$stockReport = [];

		foreach ($purchaseOrdersForStockReport as $purchaseOrder) {

			if (!($purchaseOrder->wasReceived())) {
				continue;
			}
			
			if (!isset($stockReport[$purchaseOrder->productId()])) {
				
				$stockReport[$purchaseOrder->productId()] = 0;
			}
			
			$stockReport[$purchaseOrder->productId()] += $purchaseOrder->orderedQuantity;
		}
		
		return new JsonResponse($stockReport)
	}
}
