<?php
namespace AGmakonts\STL\Number\Exception;

/**
 *
 * @author adamgrabek
 *
 */
class DivisionByZeroException extends \BadMethodCallException
{
	public function __construct()
	{

	    $this->message = "Division by zero is forbidden - universe could collapse";

	}

}

?>