<?php

/*
listing 8.3:
The ReceiveItems class (1) retrieves a specific purchase order with 
the help of PurchaseOrderRepository and (2) changes the state of the
the PurchaseOrder entity (precisely, sets the property markAsReceived to true).  
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