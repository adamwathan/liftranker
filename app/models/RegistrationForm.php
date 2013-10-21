<?php

class RegistrationForm {

	private $attributes;
	private $user;
	public $validator;

	private $rules = array(
		'username' => array('required', 'unique:users'),
		'password' => array('required'),
		'gender' => array('required', 'in:1,2'),
		'month' => array('required', 'integer', 'between:1,12'),
		'day' => array('required', 'integer', 'between:1,31'),
		'year' => array('required', 'integer'),
		'email' => array('required', 'email')
		);

	public function __construct(array $attributes)
	{
		$this->attributes = $attributes;
	}

	public function save()
	{
		if (! $this->isValid()) {
			return false;
		}

		$this->mapToUser();
		return $this->user->save();
	}

	public function isValid()
	{
		$this->validator = Validator::make(
			$this->attributes,
			$this->rules
			);
		return $this->validator->passes();
	}

	private function mapToUser()
	{
		$this->user = new User;
		$this->user->username = $this->attributes['username'];
		$this->user->password = Hash::make($this->attributes['password']);
		$this->user->gender = $this->attributes['gender'];
		$this->user->setDateOfBirth($this->attributes['year'], $this->attributes['month'], $this->attributes['day']);
		$this->user->email = $this->attributes['email'];
	}
}