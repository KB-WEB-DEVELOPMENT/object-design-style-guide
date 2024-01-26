<?php

/*
listing 4.31: We choose to record just one "event" after a change in the state of Player
and test the change in a php unit test method.
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
		$nextPosition = $this->position->toTheLeft($steps);
		
		$this->position = $nextPosition;
		
		$this->events[] = new Player($nextPosition);
	}

	public function recordedEvents(): array
	{
		return $this->events;
	}
}

/*  in php unit testing method */
public function it_can_move_left(): void
{

	$player = new Player(new Position(10,20));
	
	$player->moveLeft(4);
	
	$this->assertEquals(new Player(new Position(6,20)),player->recordedEvents());

}
