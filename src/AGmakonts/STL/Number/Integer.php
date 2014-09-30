<?php
namespace AGmakonts\STL\Number;

use AGmakonts\STL\Number\Exception\InvalidValueException;
use AGmakonts\STL\Number\NumberInterface;
/**
 *
 * @author adamgrabek
 *
 */
class Integer extends Real
{
	
    /* (non-PHPdoc)
     * @see \AGmakonts\STL\Number\Real::__construct()
     */
    public function __construct($number) {

        $value = filter_var($number, FILTER_VALIDATE_INT);

        if (FALSE === $value) {

            throw new InvalidValueException($number, ['INT']);
        }

        parent::__construct($value);

    }
    
	/* (non-PHPdoc)
	 * @see \AGmakonts\STL\Number\Real::createFrom()
	 */
	public static function createFrom(NumberInterface $number) 
	{
		$roundValue = $number->round();
		
		return new static($roundValue->getValue());
		
	}

    
    
    
    
}


