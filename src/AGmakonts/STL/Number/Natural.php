<?php
namespace AGmakonts\STL\Number;

use AGmakonts\STL\Number\Exception\InvalidValueException;
/**
 *
 * @author adamgrabek
 *
 */
class Natural extends Integer
{

	/* (non-PHPdoc)
	 * @see \AGmakonts\STL\Number\Real::__construct()
	 */
	public function __construct($number) {

	    $value = filter_var($number, FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);

	    if (FALSE === $value) {

	        throw new InvalidValueException($number, ['INT (>= 0)']);
	    }

	    parent::__construct($value);

	}

}
