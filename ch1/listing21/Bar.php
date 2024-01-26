<?php

class Bar extends Foo
{
	// method could be overriden because it is public
	public function foo(): void
	{
		// ...
	}
	
	// method could be overriden because it is protected
	protected function bar(): void
	{
		// ...
	}
	
	// method cannot be overriden because it is private
	private function baz(): void
	{
		// does not work
	}
}
