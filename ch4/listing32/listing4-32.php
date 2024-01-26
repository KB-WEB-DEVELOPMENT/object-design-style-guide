<?php

/*
listing 4.32: A variation of listing 4.31, where we allow the player to take 0 steps and
decide not to record the event.
*/

final class Player
{
	private Position $position;
	
	private array $events = [];
		
	public function __construct(
		public Position $initialPosition
	)
	{
		$this->position = $initialPosition;
	}
	
	public function moveLeft(int $steps): void
	{
		if ($steps > 0) {
		
			$nextPosition = $this->position->toTheLeft($steps);
		
			$this->position = $nextPosition;
		
			$this->events[] = new Player($nextPosition);
	
		}
		
		return;
	}

	public function recordedEvents(): array
	{
		return $this->events;
	}
}

