<?php

/* 
The constructor is validated before it is automatically assigned
Compare this with listing2.34.php
*/

final class Alerting
{
	public function __construct(
		private int $minimumLevel
	)
	{
		if ($this->minimumLevel <= 0) {
			throw new InvalidArgumentException(
				'Minimum alerting level should be greater than 0'
			);
		}
	}
}

// $alerting = new Alerting(-99999999); InvalidArgumentException thrown
