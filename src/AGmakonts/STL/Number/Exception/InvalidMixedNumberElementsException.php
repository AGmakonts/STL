<?php

namespace AGmakonts\STL\Number\Exception;

/**
 *
 * @author Adam
 *
 */
class InvalidMixedNumberElementsException extends \InvalidArgumentException
{
	public function _construct()
	{
		$this->message = "Cannot create Mixed Number with given arguments. Both arguments cannot be of the same type";
	}
}
