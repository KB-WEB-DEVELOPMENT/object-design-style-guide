<?php

/*
listing 8.9 and listing 8.10: execute() method in StockReportController (see  previous listings)

These two methods highlight a common problem: They both rely on querying the PurchaseOrder entity directly.

We try in the next listings to create read models that retrieve the purchase orders directly from
the data source, i.e : the database. 

*/

// listing 8.9
public function execute(Request $request): Response
{
	$allPurchaseOrders = $this->repository->findAll();

	$forStockReport = array_map(
						function (PurchaseOrder $purchaseOrder) {
							return $purchaseOrder->forStockReport();
						},
						$allPurchaseOrders
					);
	// ...
}

// listing 8.10
public function execute(Request $request): Response
{
		$stockReport = $this->repository->getStockReport();
		
		return new JsonResponse([$stockReport]);
}
