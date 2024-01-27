<?php

/*
Listing 8.1: Example of a class which contains 
both a query method (getById()) and a command method (save()).
  
This leads us into listing 8.2, which shows how to properly create
a PurchaseOrder entity separating the write model from the read model. 
*/

interface PurchaseOrderRepository
{
	/**
	* @throws CouldNotSavePurchaseOrder
	*/
	public function save(PurchaseOrder $purchaseOrder): void;
	
	/**
	* @throws CouldNotFindPurchaseOrder
	*/
	public function getById(int $purchaseOrderId): PurchaseOrder;
}
