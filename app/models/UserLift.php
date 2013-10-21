<?php

class UserLift extends BaseModel
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_lifts';

	protected $guarded = [];

	/*
	|--------------------------------------------------------------------------
	| Relationships
	|--------------------------------------------------------------------------
	*/

	public function user()
	{
		return $this->belongsTo('Users');
	}

	public function liftVariation()
	{
		return $this->belongsTo('LiftVariation');
	}


	public function getDisplayNameAttribute()
	{
		return (int)$this->weight_lifted . $this->liftVariation->short_name;
	}

	public function __toString()
	{
		return $this->displayName;
	}
}