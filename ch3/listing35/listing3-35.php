<?php

// listing 3.34 & 3.35 : Add getters for testing the Coordinates constructor
final class Coordinates
{
	
	// ...
	
	public function __construct(
		private float $latitude, 
		private float $longitude
	){
		if ($this->latitude > 90 || $this->latitude < -90) {
			throw new InvalidArgumentException(
				'Latitude should be between -90 and 90'
			);
		}
				
		if ($this->longitude > 180 || $this->longitude < -180) {
			throw new InvalidArgumentException(
				'Longitude should be between -180 and 180'
			);
		}
	}
	
	public function latitude(): float
	{
		return this->latitude;
	}
	
	public function longitude(): float
	{
		return this->longitude;	
	}
}

// listing 3.34 & 3.35 - use the new getters in a unit test 
public function it_can_be_constructed(): void
{
	$coordinates = new Coordinates(60.0, 100.0);
	
	$this->assertEquals(60.0,$coordinates->latitude());
	$this->assertEquals(100.0,$coordinates->longitude());

}
