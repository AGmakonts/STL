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

	private $_isEmpty = FALSE;

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
	public function uppercase()
	{

		return new static(strtoupper($this->value()));

	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::lowercase()
	 *
	 */
	public function lowercase()
	{
		return new static(strtolower($this->value()));
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::reverse()
	 *
	 */
	public function reverse()
	{
		return new static(strrev($this->value()));
	}


	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::truncate()
	 *
	 */
	public function truncate(Natural $length, StringInterface $ellipsis = NULL)
	{
		/**
		 * Create empty ellipsis for unified length calculations
		 */
		if(NULL === $ellipsis) {
			$ellipsis = new String();
		}

		/**
		 * If desired length is greater than string itself do nothing
		 */
		if(TRUE === $length->assertIsGreaterOrEqualTo($this->length())) {
			return $this;
		}

		/**
	     * Subtract elispis length from desired length
	     * to know where to start chopping string
		 */
		$finalLength = $length->subtract($ellipsis->length());

		for ($i = $finalLength->value(); $i >= 0; $i--) {

			$testedCharacter = $this->charAtPosition(new Natural($i));

			if(TRUE === $testedCharacter->assertIsEmpty()) {
				return $this->substr(new Integer(0), new Integer($i-1))->concat($ellipsis);
			}

			unset($testedCharacter);

		}

		return new String();

	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::assertIsEqualTo()
	 *
	 */
	public function assertIsEqualTo(StringInterface $string)
	{
        return ($this->value() === $string->value());
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::length()
	 *
	 */
	public function length()
	{
		return new Natural(strlen($this->value()));

	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\String\StringInterface::concat()
	 *
	 */
	public function concat(StringInterface $string)
	{
		return new static($this->value() . $string->value());
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
			$length = $length->value();
		}

		return new static(substr($this->value(), $start->value(), $length));
	}

	public function assertIsEmpty()
	{
	    return $this->_isEmpty;
	}

	/* (non-PHPdoc)
     * @see \AGmakonts\STL\String\StringInterface::value()
     */
    public function value ()
    {
        return $this->_value;

    }
	/* (non-PHPdoc)
	 * @see \AGmakonts\STL\SimpleTypeInterface::__toString()
	 */
	public function __toString() {

		return $this->value();

	}

	/* (non-PHPdoc)
	 * @see \AGmakonts\STL\String\StringInterface::getCharAtPosition()
	 */
	public function charAtPosition(Natural $position)
	{
		$one = new Natural(1);

		return $this->substr($position->subtract($one), $one);

	}






}

