<?php

// EntityManager which saves only a single object at a time - see listing2-21.php - not very useful
final class EntityManager
{	
	public function __construct(
		public object $entity
	){}
	
	public function save(): void
	{
		// ...
	}
}
