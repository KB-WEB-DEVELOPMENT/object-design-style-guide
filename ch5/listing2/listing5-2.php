<?php

/* 
Listing 5.2: Example of RunTimeException implementation (added to an Assertion Exception)
$id is a valid integer but the DB query returns null.
We use beberlei/assert library. Installation: composer require beberlei/assert
*/

// above class method:
use Assert\Assertion;
use Assert\AssertionFailedException;

// within the class
public function getRowById(int $id): array
{
	try {
		Assertion::greaterThan($id,0,'ID should be greater than 0.');
	} catch(AssertionFailedException $e) {
		$e->getValue();
		$e->getConstraints();
	}

	$record = $this->db->find($id);

	if ($record == null) {
		throw new RuntimeException('Could not find record with ID "{id}"');
	}
	
	$return record;
}


