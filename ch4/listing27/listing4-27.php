<?php

/*
The listings 4.27,4.28,4.29 and 4.30 show four snippets of php unit tests
to verify changes on mutable objects. However, each has its limitations.
The better approach is to internally record events to  verify those changes,
see listings 4.31,4.32,4.33,4.34,4.35 and 4.36
*/

/*
listing 4.27: We use the getter currentPosition() on the mutable object Player
to retrieve the latest position. Work needed to create each new getter.
*/
public function it_can_move_left(): void
{
	$player = new Player(new Position(10,20));
	$player->moveLeft(4);
	$this->assertEquals(new Position(6,20),$player->currentPosition());
}

/*
listing 4.28: We compare the newly changed object with the expected object.
No getters needed here. The problem is that this test does not take into account
other behavior changes made to the player object. 
*/
public function it_can_move_left(): void
{
	$player = new Player(new Position(10,20));
	$player->moveLeft(4);
	$this->assertEquals(new Player(new Position(6,20)),$player);
}

/*
listing 4.29: Not good. A violation of the rule that a modifier method on a mutable
objet should be a command method and return a void type, not some object type.
Position and not Player is returned, meaning that this test does not verify any changes
made to the Player mutable object. 
*/
final class Player
{
	// ...
	
	public function moveLeft($steps): Position
	{
		$this->position = $this->position->toTheLeft($steps);
		return $this->position;
	}
	
	// ...
}

	public function it_can_move_left(): void
	{
		$player = new Player(new Position(10, 20));
		$currentPosition = $player->moveLeft(4);
		$this->assertEquals(new Position(6,20),$currentPosition);
	}

/*
listing 4.30: a modification of moveLeft() in listing 4.29, it is not appropriate 
for the exact same reason.
*/
final class Player
{
	// ...
	
	public function moveLeft($steps): Position
	{
		return $this->position->toTheLeft($steps);
	}
	
	// ...
}

	public function it_can_move_left(): void
	{
		$player = new Player(new Position(10, 20));
		$currentPosition = $player->moveLeft(4);
		$this->assertEquals(new Position(6,20),$currentPosition);
	}
