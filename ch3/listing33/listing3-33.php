<?php

// listing 3.32 & 3.33 : Testing the constructor is unproductive. No need.
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
	
	// ...
}

// listing 3.32 & 3.33 - Testing the constructor is unproductive. No need.
public function it_can_be_constructed(): void
{
	$coordinates = new Coordinates(60.0, 100.0);
	
	$this->assertInstanceOf(Coordinates::class,$coordinates);
}
