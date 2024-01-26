<?php

// dynamic array used as a map

$emptyMap = [];

$mapOfStrings = [ 'foo' => 'bar', 'bar' => 'baz'];

foreach ($mapOfStrings as $key => $value) {
	/*
		$key = 'foo', $value = 'bar'
		$key = 'bar', $value = 'baz'
	*/	
}

$fooString = mapOfStrings['foo']; // 'bar'
$barString = mapOfStrings['bar']; // 'baz'

// add item to map
mapOfStrings['baz'] = 'foo';
