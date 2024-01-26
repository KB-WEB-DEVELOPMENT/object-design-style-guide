<?php

/*
Listing 7.4 -- IMPORTANT REMARKS HERE BELOW:
1) I implement the simplified EventDispatcher basing myself solely on the book implementation on page 174 (see implementation here below)
2) For a more robust implementation, look at frameworks (Symfony, Laravel) EventDispatcher implementations. 
3) Exhaustive EventDispatcher implementation  : https://gist.github.com/im4aLL/548c11c56dbc7267a2fe96bda6ed348b
4) Unlike the book, I take into account the fact that the whenUserPasswordChanged() method  of the SendEmail class will require arguments.
5) We install and use beberlei/assert package with : composer require beberlei/assert
6) We make use of this package in the EventDispatcher constructor.
7) A number of existence checks and exceptions checks are ignored in this simplified implementation
*/

// use MyClasses\SendEmail;
// use MyClasses\UserPasswordChanged;

use Assert\Assertion;
use Assert\AssertionFailedException;

// (EventDispatcher file in namespace MyClasses;)
final class EventDispatcher
{
	private array listeners;

	public function __construct(array $listenersByType)
	{
		foreach ($listenersByType as $eventType => $listeners) {
			
			try {
				Assertion::string($eventType,'The $eventType must be a string (example:"UserPasswordChanged")');
			} catch(AssertionFailedException $e) {
				$e->getValue();
				$e->getConstraints();
			}
			
			/*
				Alternatively : 
			
				if (is_string($eventType) == false) {
					throw new InvalidArgumentException('The $eventType must be a string (example:"UserPasswordChanged")');			
				}
			*/
			
			foreach ($listeners => $listener) { 

				try {
					Assertion::isCallable($listener,
					'The $listener must be callable (example:[new SendEmail(),"whenUserPasswordChanged",
					array(".... params with different array indexes needed by whenUserPasswordChanged ... ")])');
				} catch(AssertionFailedException $e) {
					$e->getValue();
					$e->getConstraints();
					}			
				/*			
				Alternatively:
			
					if (call_user_func_array(array($listener[0],$listener[1]),array(" .... params with different array indexes needed by whenUserPasswordChanged ....")) == false) {
					
						 throw new InvalidArgumentException('
							The $listener must be callable (example:[new SendEmail(),"whenUserPasswordChanged",
							array(" .... params with different array indexes needed by whenUserPasswordChanged ....")])');			
					}	
				*/			
			}
		}
	
		$this->listeners = $listenersByType;
	}
		
	public function dispatch(object $event): void
	{
		foreach ($this->listenersFor(get_class($event)) as $listener) {
				call_user_func_array(array($listener[0],$listener[1]),array(".... params with different array indexes needed by whenUserPasswordChanged ..."));					
		}				
	}
	
	private function listenersFor(string $event): array
	{		
		return (isset($this->listeners[event])) ? $this->listeners[$event] : [];	
	}
}
	
/*
Book EventDispatcher implementation:

$listener = new SendEmail();

$dispatcher = new EventDispatcher([
					'UserPasswordChanged' => [$listener,'whenUserPasswordChanged', 
										     array( .... params with different array indexes needed by whenUserPasswordChanged ...)],
					//  .....  => ....  //
			]);
			
$dispatcher->dispatch(new UserPasswordChanged());
*/	
