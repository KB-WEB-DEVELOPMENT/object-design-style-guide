<?php

$foo = new Foo();

// note : if no exception is caught, the code outside the try catch block is executed
try {

	 $foo->someMethod();

} catch (Exception $e) {
	// optional: print $e->getMessage();
}

// further code only executed if no exception is caught 
