<?php

class NullUserLift extends UserLift
{
	public $weight_lifted = 0;
	public $evidence = '#';

	public function __toString()
	{
		return '-';
	}
}