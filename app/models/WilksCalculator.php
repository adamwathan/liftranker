<?php

class WilksCalculator
{
	private $ageFactors = [
		'40' =>	1,
		'41' =>	1.01,
		'42' =>	1.02,
		'43' =>	1.031,
		'44' =>	1.043,
		'45' =>	1.055,
		'46' =>	1.068,
		'47' =>	1.082,
		'48' =>	1.097,
		'49' =>	1.113,
		'50' =>	1.13,
		'51' =>	1.147,
		'52' =>	1.165,
		'53' =>	1.184,
		'54' =>	1.204,
		'55' =>	1.225,
		'56' =>	1.246,
		'57' =>	1.268,
		'58' =>	1.291,
		'59' =>	1.315,
		'60' =>	1.34,
		'61' =>	1.366,
		'62' =>	1.393,
		'63' =>	1.421,
		'64' =>	1.45,
		'65' =>	1.48,
		'66' =>	1.511,
		'67' =>	1.543,
		'68' =>	1.576,
		'69' =>	1.61,
		'70' =>	1.645,
		'71' =>	1.681,
		'72' =>	1.718,
		'73' =>	1.756,
		'74' =>	1.795,
		'75' =>	1.835,
		'76' =>	1.876,
		'77' =>	1.918,
		'78' =>	1.961,
		'79' =>	2.005,
		'80' =>	2.05,
		'81' =>	2.096,
		'82' =>	2.143,
		'83' =>	2.19,
		'84' =>	2.238,
		'85' =>	2.287,
		'86' =>	2.337,
		'87' =>	2.388,
		'88' =>	2.44,
		'89' =>	2.494,
		'90' =>	2.549,
	];

	public function getWilksScore($total, $bodyweight, $gender, $age = 25)
	{
		return $total
		* $this->getCoefficient($bodyweight, $gender)
		* $this->getAgeFactor($age);
	}

	public function getCoefficient($bodyweight, $gender)
	{
		if ($gender == Gender::MALE) {
			return $this->getMensCoefficient($bodyweight);
		}

		return $this->getWomensCoefficient($bodyweight);
	}

	public function getMensCoefficient($bodyweight)
	{
		$coefficient = 500 / 
		(-216.0475144 + 
			(16.2606339 * $bodyweight) +
			(-0.002388645 * $bodyweight * $bodyweight) +
			(-0.00113732 * $bodyweight * $bodyweight * $bodyweight) +
			(7.01863E-06 * $bodyweight * $bodyweight * $bodyweight * $bodyweight) +
			(-1.291E-08 * $bodyweight * $bodyweight * $bodyweight * $bodyweight * $bodyweight));

		return $coefficient;
	}

	public function getWomensCoefficient($bodyweight)
	{
		$coefficient = 500 / 
		(594.31747775582 + 
			(-27.23842536447 * $bodyweight) +
			(0.82112226871 * $bodyweight * $bodyweight) +
			(-0.00930733913 * $bodyweight * $bodyweight * $bodyweight) +
			(0.00004731582 * $bodyweight * $bodyweight * $bodyweight * $bodyweight) +
			(-0.00000009054 * $bodyweight * $bodyweight * $bodyweight * $bodyweight * $bodyweight));

		return $coefficient;
	}

	public function getAgeFactor($age)
	{
		if (array_key_exists("{$age}", $this->ageFactors)) {
			return $this->ageFactors["{$age}"];
		}

		return 1;
	}
}