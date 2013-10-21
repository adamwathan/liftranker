<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');



	private static $byWilks;
	private static $byAgeAdjustedWilks;
	private $bestSquat;
	private $bestBench;
	private $bestDeadlift;
	private $bestPress;

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}




	/*
	|--------------------------------------------------------------------------
	| Relationships
	|--------------------------------------------------------------------------
	*/

	public function lifts()
	{
		return $this->hasMany('UserLift');
	}



	public function getRankAttribute()
	{
		$users = static::byAgeAdjustedWilks();

		foreach ($users as $rank => $user) {
			if ($user->id == $this->id) {
				return ($rank + 1);
			}
		}
	}



	/*
	|--------------------------------------------------------------------------
	| Properties
	|--------------------------------------------------------------------------
	*/

	public function getNameAttribute()
	{
		return $this->username;
	}

	public function getSexAttribute()
	{
		return ($this->gender == Gender::MALE ? 'M' : 'F');
	}

	public function getAgeAttribute()
	{
		$dateOfBirth = new DateTime($this->date_of_birth);

		return $dateOfBirth->diff(new DateTime)->y;
	}

	public function getBodyweightAttribute()
	{
		$bodyweight = 0;

		foreach($this->bestLifts() as $lift) {
			if ($lift and $lift->bodyweight > $bodyweight) {
				$bodyweight = $lift->bodyweight;
			}
		}

		return $bodyweight;
		//return (int) max($this->lifts()->lists('bodyweight'));
	}

	public function getWeightClassAttribute()
	{
		$classes = [52, 56, 60, 67.5, 75, 82.5, 90, 100, 110, 125, 140];


		foreach($classes as $class) {
			if ($this->bodyweight < ($class * 2.2046)) {
				return (int)($class * 2.2046);
			}
		}

		return '308+';
	}

	public function bestLifts()
	{
		return [$this->squat, $this->bench, $this->deadlift];
	}


	public function getBest($liftName)
	{
		// This is way faster than trying to abstract it
		// Would like to figure out a way to optimize without it though
		$lift = DB::table('user_lifts')
		->join('lift_variations', 'user_lifts.lift_variation_id', '=', 'lift_variations.id')
		->join('lifts', 'lift_variations.lift_id', '=', 'lifts.id')
		->where('user_lifts.user_id', '=', $this->id)
		->where('lifts.name', '=', $liftName)
		->orderBy('user_lifts.created_at', 'desc')
		->first();

		if (! $lift) {
			return new NullUserLift;
		}

		$best = new UserLift((array)$lift);

		return $best;
	}

	public function getSquatAttribute()
	{
		if (isset($this->bestSquat)) {
			return $this->bestSquat;
		}

		return $this->bestSquat = $this->getBest('Squat');
	}

	public function getBenchAttribute()
	{
		if (isset($this->bestBench)) {
			return $this->bestBench;
		}
		
		return $this->bestBench =$this->getBest('Bench Press');
	}

	public function getDeadliftAttribute()
	{
		if (isset($this->bestDeadlift)) {
			return $this->bestDeadlift;
		}
		
		return $this->bestDeadlift =$this->getBest('Deadlift');
	}

	public function getPressAttribute()
	{
		if (isset($this->bestPress)) {
			return $this->bestPress;
		}
		
		return $this->bestPress =$this->getBest('Press');
	}

	public function getTotalAttribute()
	{
		if (! $this->hasLifts() ) {
			return 0;
		}

		return $this->squat->weight_lifted
		+ $this->bench->weight_lifted
		+ $this->deadlift->weight_lifted;
	}

	public function getBodyweightFactorAttribute()
	{
		return number_format($this->total/$this->bodyweight, 2);
	}

	public function getAgeAdjustedWilksAttribute()
	{
		$calculator = new WilksCalculator;

		$squat = $this->squat->weight_lifted / 2.2046;
		$squatBw = $this->squat->bodyweight / 2.2046;
		$squatWilks = $calculator->getWilksScore($squat, $squatBw, $this->gender, $this->age);
		
		$bench = $this->bench->weight_lifted / 2.2046;
		$benchBw = $this->bench->bodyweight / 2.2046;
		$benchWilks = $calculator->getWilksScore($bench, $benchBw, $this->gender, $this->age);
		
		$deadlift = $this->deadlift->weight_lifted / 2.2046;
		$deadliftBw = $this->deadlift->bodyweight / 2.2046;
		$deadliftWilks = $calculator->getWilksScore($deadlift, $deadliftBw, $this->gender, $this->age);

		return number_format($squatWilks + $benchWilks + $deadliftWilks,1);
	}

	public function getWilksAttribute()
	{
		$calculator = new WilksCalculator;
		
		$squat = $this->squat->weight_lifted / 2.2046;
		$squatBw = $this->squat->bodyweight / 2.2046;
		$squatWilks = $calculator->getWilksScore($squat, $squatBw, $this->gender);
		
		$bench = $this->bench->weight_lifted / 2.2046;
		$benchBw = $this->bench->bodyweight / 2.2046;
		$benchWilks = $calculator->getWilksScore($bench, $benchBw, $this->gender);
		
		$deadlift = $this->deadlift->weight_lifted / 2.2046;
		$deadliftBw = $this->deadlift->bodyweight / 2.2046;
		$deadliftWilks = $calculator->getWilksScore($deadlift, $deadliftBw, $this->gender);

		return number_format($squatWilks + $benchWilks + $deadliftWilks,1);
	}

	public function setDateOfBirth($year, $month, $day)
	{
		$this->date_of_birth = $year . '-' . $month . '-' . $day;
	}

	public function addLift(UserLift $lift)
	{
		$this->lifts()->save($lift);
	}


	public static function byAgeAdjustedWilks()
	{
		return isset(static::$byAgeAdjustedWilks) ? static::$byAgeAdjustedWilks : static::$byAgeAdjustedWilks = static::whoHaveLifts()->sortBy(function($user) {
			return $user->ageAdjustedWilks;
		})->reverse();
	}


	public static function byWilks()
	{
		return isset(static::$byWilks) ? static::$byWilks : static::$byWilks = static::whoHaveLifts()->sortBy(function($user) {
			return $user->wilks;
		})->reverse();
	}

	public static function whoHaveLifts()
	{
		$result = [];

		foreach(static::all() as $user) {
			if ($user->hasLifts()) {
				$result[] = $user;
			}
		}

		return new \Illuminate\Support\Collection($result);
	}

	public function hasLifts()
	{
		if (! $this->hasSquat() and ! $this->hasBench() and ! $this->hasDeadlift() and ! $this->hasPress()) {
			return false;
		}

		return true;
	}

	public function hasSquat()
	{	
		return (bool) $this->squat->weight_lifted;
	}

	public function hasBench()
	{
		return (bool) $this->bench->weight_lifted;
	}

	public function hasDeadlift()
	{
		return (bool) $this->deadlift->weight_lifted;
	}

	public function hasPress()
	{
		return (bool) $this->press->weight_lifted;
	}
}