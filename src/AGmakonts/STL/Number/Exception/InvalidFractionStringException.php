<?php

namespace AGmakonts\STL\Number\Exception;

/**
 *
 * @author Adam
 *
 */
class InvalidFractionStringException extends \InvalidArgumentException {


	public function __construct($expression, $description)
	{
		$message = "Expression '%s' cannpt be converted to valid Fraction. Reason: %s.";

		$this->message = sprintf($message, $expression, $description);

	}
}
