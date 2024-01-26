<?php

// See listing 2.26 - Here the listeners are configured during construction time and not added individually
final class EventDispatcher
{
	
	public function __construct(
		public array $listenersByEventName
	){}

	public function removeListener(string $event,callable $listener): void
	{
		foreach ($this->listenersFor($event) as $key => $callable) {
						
			if ($callable == $listener) {
				unset($this->listeners[$event][$key]);
			}
		}
	}	
	
	public function dispatch(object $event): void
	{
		foreach ($this->listenersFor(get_class($event)) as $callable) {
			$callable($event);
		}
	}
	
	private function listenersFor(string $event): array
	{		
		return isset($this->listeners[$event]) ? $this->listeners[$event] : array();
	}
}
