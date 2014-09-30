<?php

namespace AGmakonts\STL\String;

use AGmakonts\STL\Number\Natural;
use AGmakonts\STL\String\StringInterface;
use AGmakonts\STL\String\Exception\InvalidStringValueException;

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
		
		if(NULL === $value) {
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
	}
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::reverse()
	 *
	 */
	public function reverse() {
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
	 * @see \AGmakonts\STL\String\StringInterface::lowercase()
	 *
	 */
	public function lowercase() {
	}
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::truncate()
	 *
	 */
	public function truncate(Natural $length, StringInterface $elipsis = NULL) {
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
	public function getLength() {
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
	public function substr($start, $length) {
	}
}

?>