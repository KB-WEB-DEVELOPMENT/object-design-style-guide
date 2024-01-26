<?php

class Bar extends Foo
{
	public function someMethod(): void
	{
		$this->foo(); // accessible because foo() is public

		$this->bar(); // accessible because bar() is protected

		//$this->baz(); inaccessible because baz() is private
	
	}
}
