<?php

namespace AGmakonts\STL\String;

use AGmakonts\STL\Number\Natural;
use AGmakonts\STL\String\StringInterface;
use AGmakonts\STL\String\Exception\InvalidStringValueException;
use AGmakonts\STL\Number\Integer;

/**
 *
 * @author Adam
 *
 */
class String implements StringInterface
{

	private $_value;

	private $_isEmpty;

	public function __construct($value = NULL)
	{
		if(FALSE === is_string($value) && NULL !== $value) {
			throw new InvalidStringValueException($value);
		}

		$this->_value = $value;

		if(NULL === $value || TRUE === ctype_space($value)) {
			$this->_isEmpty = TRUE;
			$this->_value = "";
		}

	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::uppercase()
	 *
	 */
	public function uppercase() {
		
		return new static(strtoupper($this->getValue()));
		
	}
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::lowercase()
	 *
	 */
	public function lowercase()
	{
		return new static(strtolower($this->getValue()));
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::reverse()
	 *
	 */
	public function reverse() 
	{
		return new static(strrev($this->getValue()));
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::simpleFormat()
	 *
	 */
	public function simpleFormat(StringInterface $string) {
	}

	

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::truncate()
	 *
	 */
	public function truncate(Natural $length, StringInterface $elipsis = NULL) 
	{
		if(NULL === $elipsis) {
			$elipsis = new String();
		}
		
		if(TRUE === $length->assertIsGreaterOrEqualTo($this->getLength())) {
			
			return $this;
			
		}
		
		$finalLength = $length->subtract($elipsis->getLength());
		
		for ($i = $finalLength->getValue(); $i >= 0; $i--) {
			
			$testedCharacter = $this->getCharAtPosition(new Natural($i));
			
			if(TRUE === $testedCharacter->assertIsEmpty()) {
				
				return $this->substr(new Integer(0), new Integer($i));
				
			}
			
		}		
		
		
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::compareTo()
	 *
	 */
	public function compareTo(StringInterface $string) {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::getLength()
	 *
	 */
	public function getLength() 
	{
		return new Natural(strlen($this->getValue()));
		
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::concat()
	 *
	 */
	public function concat(StringInterface $string) {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::substr()
	 *
	 */
	public function substr(Integer $start, Integer $length = NULL)
	{
		if(NULL !== $length) {
			$lengthValue = $length->getValue();
		}

		return new static(substr($this->getValue(), $start->getValue(), $lengthValue));
	}

	public function assertIsEmpty()
	{
	    return $this->_isEmpty;
	}

	/* (non-PHPdoc)
     * @see \AGmakonts\STL\String\StringInterface::getValue()
     */
    public function getValue ()
    {
        return $this->_value;

    }
	/* (non-PHPdoc)
	 * @see \AGmakonts\STL\SimpleTypeInterface::__toString()
	 */
	public function __toString() {
		
		return $this->getValue();
		
	}
	
	/* (non-PHPdoc)
	 * @see \AGmakonts\STL\String\StringInterface::getCharAtPosition()
	 */
	public function getCharAtPosition(Natural $position) 
	{
		$one = new Natural(1);
		
		return $this->substr($position->subtract($one), $one);
		
	}


	


}

