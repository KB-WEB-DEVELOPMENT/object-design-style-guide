<?php
	
	// correct class implementation, it provides an implementation for foo(), does not call bar()
	class Baz extends Foo
	{
		public function foo(): void
		{
		}
	}
