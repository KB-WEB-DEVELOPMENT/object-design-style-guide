<?php

// dynamic array used as list

$emptyList = [];

$listOfStrings = ['foo', 'bar'];

foreach ($listOfStrings as $key => $value) {
	
	/* 
	$key = 0, $value = 'foo'
	$key = 1, $value = 'bar'
	*/
}

foreach ($listOfStrings as $value) {
	
	/* 
	$value = 'foo'
    $value = 'bar'
	*/

}

$fooString = $listOfStrings[0]; // 'foo'
$barString = $listOfStrings[1]; // 'bar'

// add item  to list 
listOfStrings[] = 'baz';
