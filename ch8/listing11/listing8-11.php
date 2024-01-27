<?php

/*
listing 8.11: (see previous listings) We query the DB wiwth PDO and create the StockReport class.

*/

use MyClasses/MyPDO;

final class StockReportSqlRepository implements StockReportRepository
{
	public __construct(
		private MyPDO $pdo; 
		// ...
	}{}
	
	public function getStockReport(): StockReport
	{
		$sql = 'SELECT product_id, SUM(ordered_quantity) AS quantity_in_stock ';

		$sql .='FROM purchase_orders WHERE was_received=1 GROUP BY product_id';

		$statement = $this->pdo->prepare($sql);

		$statement->execute();

		$data = $statement->fetchAll();

		return new StockReport($data);
	}
	
	// ...
}
