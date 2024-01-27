<?php

/*
Listing 7.13 (compare with listing 7.12): We use EventDispatcherSpy as a test double spy
for EventDispatcher. 
-  Unlike the Unit testing "it_dispatches_a_user_password_changed_event() method" in
ChangePasswordServiceTest()(listing 7.12), we can now use an actual assertion.
*/

final class EventDispatcherSpy implements EventDispatcher
{

	private array $events = [];

	public function dispatch(object $event): void
	{
		$this->events[] = $event;
	}
	
	public function dispatchedEvents(): array
	{
		return $this->events;
	}
}

// modified method of ChangePasswordServiceTest (see listing 7-12)

public function it_dispatches_a_user_password_changed_event(): void
{
	// ...
		
	$userId = new UserId();
	
	$eventDispatcherSpy = new EventDispatcherSpy();

	$service = new ChangePasswordService($eventDispatcherSpy,/* ... */);
	
	$testPassword = "1234";

	$service->changeUserPassword($userId,$testPassword);

	$this->assertEquals(
				[new UserPasswordChanged($userId)],
				$eventDispatcherSpy->dispatchedEvents()
	);
}
