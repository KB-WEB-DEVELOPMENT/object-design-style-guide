<?php

// Much simplified version of an event dispatcher - The object behaviour can change after instantiation
final class EventDispatcher
{
	private array $listeners = [];

	public function addListener(string $event,callable $listener): void
	{
		$this->listeners[$event][] = $listener;
	}
	
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
