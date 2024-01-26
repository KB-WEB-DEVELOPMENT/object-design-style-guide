<?php

/*
listing 4-24 : Example of object modifier methods which should first 
check that the an object state change is valid before modifying any properties values.
*/

final class SalesOrder
{
	// ...
	
	public function markAsDelivered(Timestamp $deliveredAt): void
	{
		/*
		* You shouldn't be able to deliver the order if it has been
		* cancelled.
		*/
	}
	
	public function cancel(Timestamp $cancelledAt): void
	{
		/*
		* You shouldn't be able to cancel an order if it has already
		* been delivered.
		*/
	}

	// ...

}

/*
listing 4-25 : unit test method testing cancellation of a delivered sales order
*/

function a_delivered_sales_order_can_not_be_cancelled(): void
{
	$deliveredSalesOrder = new SalesOrder(/* .... */);

	$deliveredSalesOrder->markAsDelivered($deliveredAt);

	$deliveredSalesOrder->cancel($cancelledAt);	

	$this->expectException(LogicException::class);
}

/*
listing 4-26 : If a SalesOrder was already cancelled, we ignore the request
I use PHP 8.1 enum data type
*/

public function cancel()
{
	// ...
	
	if ($this->status === Status::CANCELLED) {
		return;
	}
	
	// ...
}
