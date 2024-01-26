<?php

/*
Listings 4.33/4.34/4.35/4.36: In the first listing, we decide to record
the initial position of the player as an event. The last three listings show how to deal 
with this initial position when it come to testing.
*/

// listing 4.33
final class Player
{
	private Position $position;
	
	private array $events = [];
		
	public function __construct(
		public Position $initialPosition
	)
	{
		$this->position = $initialPosition;
	
		$this->events[] = new Player($initialPosition);
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

/*  Listing 4.34: in php unit testing method, the test fails */
public function it_can_move_left(): void
{

	$player = new Player(new Position(10,20));
	
	$player->moveLeft(4);
	
	// this fails because of the initial position
	$this->assertEquals(new Player(new Position(6,20)),$player->recordedEvents()); 

}

/*  Listing 4.35: in php unit testing method, the test passes */
public function it_can_move_left(): void
{

	$player = new Player(new Position(10,20));
	
	$player->moveLeft(4);
	
	// this passes
	 $this->assertContains(new Player(new Position(6,20)),$player->recordedEvents()); 

}

/*  Listing 4.36: changes to the MoveLeft() method
	the test passes but the positions are not updated and therefore not accurate  
*/

final class Player
{
	//...
	public function moveLeft(int $steps): void
	{
		$this->events[] = new Player($nextPosition);
	}
}
