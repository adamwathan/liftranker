<?php

class Person {
	public $firstName;

	public $email;

	private $lastName;

	public function setLastName($value)
	{
		$this->lastName = $value;
	}
}