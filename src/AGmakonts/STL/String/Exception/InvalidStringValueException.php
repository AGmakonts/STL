<?php

namespace AGmakonts\STL\String\Exception;

/**
 *
 * @author Adam
 *
 */
class InvalidStringValueException extends \InvalidArgumentException
{
	public function __construct($value)
	{
		$message = "Value '%s' is not valid string";

		$this->message = sprintf($message, $value);
	}
}
