<?php

/*
Listing 3.28 - Domain -specific event - "placing a new sales order" 
*/

final class SalesOrder
{
	public static function place(/* ... */): SalesOrder
	{
		// ...
	}
}

/*

sample code:

$salesOrder = SalesOrder->place(// ... //);


*/
