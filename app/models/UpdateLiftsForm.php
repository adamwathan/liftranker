<?php

class UpdateLiftsForm {

	private $attributes;
	private $squat;
	private $bench;
	private $deadlift;
	private $press;
	private $user;

	public $validator;

	private $rules = array(
		'squatWeightLifted'     => array('required_with:squatBodyweight', 'numeric'),
		'squatBodyweight'       => array('required_with:squatWeightLifted', 'numeric'),
		'squatDatePerformed'    => array('required_with:squatWeightLifted,date'),
		'squatEvidence'         => array('required_with:squatWeightLifted', 'url'),
		'squatVariation'        => array('required_with:squatWeightLifted'),
		
		'benchWeightLifted'     => array('required_with:benchBodyweight', 'numeric'),
		'benchBodyweight'       => array('required_with:benchWeightLifted', 'numeric'),
		'benchDatePerformed'    => array('required_with:benchWeightLifted,date'),
		'benchEvidence'         => array('required_with:benchWeightLifted', 'url'),
		'benchVariation'        => array('required_with:benchWeightLifted'),
		
		'deadliftWeightLifted'  => array('required_with:deadliftBodyweight', 'numeric'),
		'deadliftBodyweight'    => array('required_with:deadliftWeightLifted', 'numeric'),
		'deadliftDatePerformed' => array('required_with:deadliftWeightLifted,date'),
		'deadliftEvidence'      => array('required_with:deadliftWeightLifted', 'url'),
		'deadliftVariation'     => array('required_with:deadliftWeightLifted'),
		
		'pressWeightLifted'    => array('required_with:pressBodyweight', 'numeric'),
		'pressBodyweight'      => array('required_with:pressWeightLifted', 'numeric'),
		'pressDatePerformed'   => array('required_with:pressWeightLifted,date'),
		'pressEvidence'        => array('required_with:pressWeightLifted', 'url'),
		'pressVariation'        => array('required_with:pressWeightLifted'),

		);

	private $messages = array(
		'required' => 'This field is required.',
		'required_with' => 'This field is required.',
		'numeric' => 'Must be numeric.',
		'url' => 'Must be a valid URL.',
		);

	public function __construct(array $attributes, User $user)
	{
		$this->attributes = $attributes;
		$this->user = $user;
	}

	public function save()
	{
		if (! $this->isValid()) {
			return false;
		}

		$this->mapToUserLifts();
		return $this->user->save();
	}

	public function isValid()
	{
		$this->validator = Validator::make(
			$this->attributes,
			$this->rules,
			$this->messages
			);
		return $this->validator->passes();
	}

	private function mapToUserLifts()
	{
		$this->mapSquat();
		$this->mapBench();
		$this->mapDeadlift();
		$this->mapPress();
	}

	private function mapSquat()
	{
		if(! $this->hasSquat()) {
			return;
		}

		$this->squat = new UserLift;
		$this->squat->weight_lifted = $this->attributes['squatWeightLifted'];
		$this->squat->bodyweight = $this->attributes['squatBodyweight'];
		$this->squat->date_performed = $this->attributes['squatDatePerformed'];
		$this->squat->evidence = $this->attributes['squatEvidence'];
		$this->squat->lift_variation_id = LiftVariation::find($this->attributes['squatVariation'])->id;

		$this->user->addLift($this->squat);
	}

	private function mapBench()
	{
		if(! $this->hasBench()) {
			return;
		}
		
		$this->bench = new UserLift;
		$this->bench->weight_lifted = $this->attributes['benchWeightLifted'];
		$this->bench->bodyweight = $this->attributes['benchBodyweight'];
		$this->bench->date_performed = $this->attributes['benchDatePerformed'];
		$this->bench->evidence = $this->attributes['benchEvidence'];
		$this->bench->lift_variation_id = LiftVariation::find($this->attributes['benchVariation'])->id;

		$this->user->addLift($this->bench);
	}

	private function mapDeadlift()
	{	
		if(! $this->hasDeadlift()) {
			return;
		}
		
		$this->deadlift = new UserLift;
		$this->deadlift->weight_lifted = $this->attributes['deadliftWeightLifted'];
		$this->deadlift->bodyweight = $this->attributes['deadliftBodyweight'];
		$this->deadlift->date_performed = $this->attributes['deadliftDatePerformed'];
		$this->deadlift->evidence = $this->attributes['deadliftEvidence'];
		$this->deadlift->lift_variation_id = LiftVariation::find($this->attributes['deadliftVariation'])->id;

		$this->user->addLift($this->deadlift);
	}

	private function mapPress()
	{
		if(! $this->hasPress()) {
			return;
		}
		
		$this->press = new UserLift;
		$this->press->weight_lifted = $this->attributes['pressWeightLifted'];
		$this->press->bodyweight = $this->attributes['pressBodyweight'];
		$this->press->date_performed = $this->attributes['pressDatePerformed'];
		$this->press->evidence = $this->attributes['pressEvidence'];
		$this->press->lift_variation_id = LiftVariation::find($this->attributes['pressVariation'])->id;

		$this->user->addLift($this->press);
	}

	private function hasSquat()
	{
		return (bool) $this->attributes['squatWeightLifted'];
	}

	private function hasBench()
	{
		return (bool) $this->attributes['benchWeightLifted'];
	}

	private function hasDeadlift()
	{
		return (bool) $this->attributes['deadliftWeightLifted'];
	}

	private function hasPress()
	{
		return (bool) $this->attributes['pressWeightLifted'];
	}
}