<?php

class LiftVariation extends BaseModel
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lift_variations';



	/*
	|--------------------------------------------------------------------------
	| Relationships
	|--------------------------------------------------------------------------
	*/

	public function lift()
	{
		return $this->belongsTo('Lift');
	}

	public function userLifts()
	{
		return $this->hasMany('UserLift');
	}
}