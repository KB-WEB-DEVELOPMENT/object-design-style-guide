<?php

/*

Listing 3.31 : Issue here - Too much data into the event object, too many dependencies not related to 
               the event object. Use rather an empty constructor and add data on a need-tpo-know basis. 

*/

final class ProductCreated
{
	public function __construct(
		ProductId $productId,
		Description $description,
		StockValuation $stockValuation,
		Timestamp $createdAt,
		UserId $createdBy,
		/* ... */
	) {
		// ...
	}
}

/*
sample code:

$this->recordThat(new ProductCreated(// ... //));

*/
