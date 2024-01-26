<?php

/*
Compare listing 5.7a and listing5.7b: Use rather a named constructor which
gives a detailed exception message.
*/

// listing 5.7a:
final class CouldNotFindProduct extends RuntimeException
{
	// ...
}

// implementation of listing 5.7a within a class:
throw new CouldNotFindProduct('Could not find a product with ID "{productId}"');


// listing 5.7b:
final class CouldNotFindProduct extends RuntimeException
{
	
	// ...
	
	public static function withId(ProductId $productId): CouldNotFindProduct
	{
		return new CouldNotFindProduct('Could not find a product with ID "{productId}"');
	}
	
	// ...
}

// implementation of listing 5.7b within a class:
throw CouldNotFindProduct->withId($productId);
