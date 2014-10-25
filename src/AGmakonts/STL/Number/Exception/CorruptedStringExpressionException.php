<?php

namespace AGmakonts\STL\Number\Exception;

/**
 *
 * @author Adam
 *
 */
class CorruptedStringExpressionException extends \BadMethodCallException
{
	public function _construct()
	{
		$this->message = 'String expression is corrupted';
	}

}

