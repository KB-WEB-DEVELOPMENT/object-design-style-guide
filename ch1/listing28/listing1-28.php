<?php

final class Foo
{
	// throwing an exception which interrupts the execution of the method
	public function someMethod(): void
	{
		if (/* check if script stops here */) {
			
			throw new \RuntimeException('Something is wrong');
			
			// .... code here never executed 
		
		}
		
		// ... code executed here only if the if condition is not satisfied
	}	
}
