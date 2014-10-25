<?php

namespace AGmakonts\STL\String\Exception;

/**
 *
 * @author Adam
 *
 */
class InvalidStringValueException extends \InvalidArgumentException
{
	public function _construct($value)
	{
		$message = "Value '%s' is not valid string";

		$this->message = sprintf($message, $value);
	}
}
