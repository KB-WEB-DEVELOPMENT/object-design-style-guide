<?php

/*
listing 8.14: We could tie an event listener [new UpdateStockReport(),'whenPurchaseOrderReceived']
here below to the event PurchaseOrderReceived (listing 8.12) which would regularly update
a stock report mysql table.
The implementation below gives an idea of what is feasible.
*/

use MyClasses/MyPDO;
use MyClasses/PurchaseOrderReceived;
		
final class UpdateStockReport
{
	public function __construct(
		private MyPDO $pdo, 
		private PurchaseOrderReceived $event
	){}
		
	public function productIdExists(): bool
	{
			
		$sql = 'SELECT * FROM stock_report WHERE product_id=:product_id';
		
		$data = ['product_id' => $this->event->productId()];
		
		$stmt = $this->pdo->prepare($sql);
			
		$stmt->execute($data);
		  
		$result = $stmt->fetch();
	
		return ($result == false) ? false : true;
	}
	
	public function updateQuantity(): void
	{
		
		if ($this->productIdExists() == false) {

			$sql = 'INSERT INTO stock_report (quantity_in_stock) VALUES (:quantity_in_stock)';
		
			$data = ['quantity_in_stock' => $this->event->receivedQuantity()];
					
			$stmt = $this->pdo->prepare($sql);
			
			$stmt->execute($data);
			
		} else {
						
			$sql1 = 'SELECT quantity_in_stock FROM stock_report WHERE product_id=:product_id';
			
			$data1 = ['product_id' => $this->event->productId()];
		
			$stmt1 = $this->pdo->prepare($sql1);
			
			$stmt1->execute($data1);  
			
			$result = $stmt1->fetch(PDO::FETCH_ASSOC);
			
			$quantity_in_stock = $result['quantity_in_stock'];
			
			$newQuantity = $quantity_in_stock + $this->event->receivedQuantity();
			
			$sql2 = 'UPDATE stock_report SET quantity_in_stock=:quantity_in_stock WHERE product_id=:product_id';
		
			$data2 = ['product_id' => $this->event->productId(),'quantity_in_stock' => $newQuantity];
						
			$stmt2= $this->pdo->prepare($sql2);
			
			$stmt2->execute($data2);		
	}	

	public function whenPurchaseOrderReceived(): void
	{
		/* 
			some kind of implementation of this event listener containing the info
			updated in the stock_report database table and/or just $this->event. 
		*/	

	}	
}
