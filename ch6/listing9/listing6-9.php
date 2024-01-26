<?php

/* 
Compare listing 6.9a and listing 6.9b: the second alternative is the 
better one as we are not exposing exposing object properties to the client.
*/

// Listing 6.9a
final class ShoppingBasket
{
	// ...
	public function getItems(): array
	{
		return $this->items;
	}
	// ...
}

// on the client side
$basket = new ShoppingBasket();
count($basket->getItems());

// Listing 6.9b
final class ShoppingBasket
{
	// ...
	public function itemCount(): int
	{
		return count($this->items);
	}
	// ...
}

// on the client side
$basket = new ShoppingBasket();
$basket->itemCount();
