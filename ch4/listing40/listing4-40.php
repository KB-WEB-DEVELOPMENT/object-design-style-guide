<?php

/*
Listing 4.37: Example of a fluent interface.
All modifier methods return $this.
*/

$queryBuilder = (new QueryBuilder())->create()
					->select(/* ... */)
					->from(/* ... */)
					->where(/* ... */)
					->orderBy(/* ... */);

/*
Listing 4.38: It is not clear if QueryBuilder below is immutable or not.
*/

final class QueryBuilder
{
	public function select(/* ... */): QueryBuilder
	{
		// ...
	}
	
	public function from(/* ... */): QueryBuilder
	{
		// ...
	}
	
	// ...
}

/*
Listing 4.39: To use $queryBuilder in the example below, we hope it is immutable.
However, listing 4.40 shows it is not immutable. We can make it immutable but transforming
all the method modifiers the way the method where() is modifed  by changing listing 4.40 to listing 4.41.
*/

$queryBuilder = (new QueryBuilder())->create();
$qb1 = $queryBuilder->select(/* ... */)
			->from(/* ... */)
			->where(/* ... */)
			->orderBy(/* ... */);

$qb2 = $queryBuilder->select(/* ... */)
			->from(/* ... */)
			->where(/* ... */)
			->orderBy(/* ... */);

/*
Listing 4.40: see remark in listing 4.39
*/

public function where(string $clause, string $value): QueryBuilder
{
	$this->whereParts[] = $clause;
	
	$this->values[] = $value;
	
	return $this;
}

/*
Listing 4.41: see remark in listing 4.39
*/

public function where(string $clause, string $value): QueryBuilder
{
	$copy = clone $this;
	
	$copy->whereParts[] = $clause;
	
	$copy->values[] = $value;

	return $copy;
}

/*
Listing 4.42 Example of using modifier methods on an immutable object 
to form a fluent interface
*/

$position = (new Position())->startAt(10,5)
				->toTheLeft(4)
				->toTheRight(2);
				
$position->toTheLeft(3)->toTheRight(6);

// ...				
