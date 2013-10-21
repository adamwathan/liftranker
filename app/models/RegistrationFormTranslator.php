<?php

class RegistrationFormTranslator extends Translator
{
	protected $sourceClass = 'RegistrationForm';

	protected $targetClass = 'Person';

	protected $propertyMap = array(
		'first_name' => 'firstName',
		'last_name' => 'setLastName',
		'getEmail' => 'email',
		);
}
