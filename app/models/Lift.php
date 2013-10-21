<?php

class Lift extends BaseModel
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lifts';



	/*
	|--------------------------------------------------------------------------
	| Relationships
	|--------------------------------------------------------------------------
	*/

	public function variations()
	{
		return $this->hasMany('LiftVariation');
	}

}