<?php

/* 
Listing 4.5 : Example of an entity (SalesInvoice) which uses 4 different value objects 
(SalesInvoiceId, Datum, Quantity and ProductId). The value objects wrap one more primitive-type
values which can be provided to their constructors or not. (Ex : Quantity). Could use ENUM for ProductId.
*/
final class SalesInvoice
{
	public static function create(SalesInvoiceId $salesInvoiceId,Datum $invoiceDate): SalesInvoice
	{
		// ...
	}
	
	public function addLine(ProductId $productId,Quantity $quantity): void
	{
		$this->lines[] = (new Line())->create($productId,$quantity);
	}
}
/*
final class SalesInvoiceId
{
	// ...
}

final class Datum
{
	// ...
}

final class Quantity
{
	public static function fromInt(int $quantity,int $precision): Quantity
	{
		// ...
	}
}

final class ProductId
{
	public static function fromInt(int $productId): ProductId
	{
		// ...
	}
}
*/
