<?php

/*
listing 8.15: Updated version of StockReportSqlRepository (see listing 8.11)

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
		$sql = 'SELECT * FROM stock_report';

		$statement = $this->pdo->prepare($sql);

		$statement->execute();

		$data = $statement->fetchAll();

		return new StockReport($data);
	}
	
	// ...
}
