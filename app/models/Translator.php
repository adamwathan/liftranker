<?php

abstract class Translator
{
	protected $sourceClass;

	protected $targetClass;

	protected $sourceObject;

	protected $targetObject;

	/**
	 * This array contains the source property/method and
	 * the target property/method as key => value pairs.
	 *
	 * Examples:
	 * 'getFirstName' => 'firstName'
	 * 'first_name' => 'setFirstName'
	 * 'first_name' => 'firstName'
	 * 
	 * @var array
	 */
	protected $propertyMap = array();


	/**
	 * Map the source class to a new target class
	 * @param  $source 	The object to translate
	 * @return        	The translated object
	 */
	public function translateFrom($source)
	{
		$this->sourceObject = $source;
		$this->targetObject = new $this->targetClass;

		foreach($this->propertyMap as $source => $target) {
			$this->mapProperty($source, $target);
		}

		return $this->targetObject;
	}


	/**
	 * Map a property from the source object to the target object
	 * @param  $source 	Property/method to map from
	 * @param  $target 	Property/method to map to
	 */
	protected function mapProperty($source, $target)
	{
		$sourceValue = $this->getSourceValue($source);
		$this->setTargetValue($target, $sourceValue);
	}

	/**
	 * Get the value of a property from the source object
	 * @param  $source	Property/Method to get
	 * @return 			The value of the property
	 */
	protected function getSourceValue($source)
	{
		// Check if the property is actually a getter method
		if (is_callable(array($this->sourceObject, $source))) {
			return $this->sourceObject->{$source}();
		}

		return $this->sourceObject->{$source};
	}

	/**
	 * Set the value of a property on the target object
	 * @param $target 	Property/Method to set
	 * @param $value 	Value to set it to
	 * @return 			The target object
	 */
	protected function setTargetValue($target, $value)
	{
		// Check if we are using a setter or just setting a public property
		if (is_callable(array($this->targetObject, $target))) {
			$this->targetObject->{$target}($value);
		} else {
			$this->targetObject->{$target} = $value;
		}

		return $this->targetObject;
	}
}
