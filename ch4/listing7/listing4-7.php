<?php

/*
Listing 4.7 : Examples of 2 DTOs (Data Transfer Object)
- Their properties may be filled based on data submitted by user for example 
- Just holds data, no getter, no setter
- for PHP 8.1+, use readonly on their properties
*/

final class CreateSalesInvoice
{
	public readonly string date;

	/* holds instances of the DTO class Line */
	public readonly array lines = [];
}

final class Line
{
	public readonly int productId;

	public readonly int quantity;
}
