<?php

namespace AGmakonts\STL\Number;

use AGmakonts\STL\Number\Integer;
use AGmakonts\STL\Number\Fraction;
use AGmakonts\STL\Number\Exception\InvalidMixedNumberElementsException;

/**
 *
 * @author Adam
 *
 */
class MixedNumber implements NumberInterface
{
	/**
	 *
	 * @var Integer
	 */
	private $_integer;

	/**
	 *
	 * @var Fraction
	 */
	private $_fraction;

	/**
	 */
	function __construct(NumberInterface $number, NumberInterface $secondPart = NULL)
	{

		if($number instanceof $secondPart) {
			throw new InvalidMixedNumberElementsException();
		}

		if (FALSE === ($number instanceof Integer) || FALSE === ($number instanceof Fraction)) {
			throw new InvalidMixedNumberElementsException();
		}

		if (FALSE === ($secondPart instanceof Integer) || FALSE === ($secondPart instanceof Fraction)) {
			throw new InvalidMixedNumberElementsException();
		}

		if($number instanceof Integer) {
			$this->_integer = $number;
		} elseif ($number instanceof Fraction) {
			$this->_fraction = $number;
		}

		if($secondPart instanceof Integer && NULL === $this->_integer) {
			$this->_integer = $secondPart;
		} elseif ($secondPart instanceof Fraction && NULL === $this->_fraction) {
			$this->_fraction = $secondPart;
		}


	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::value()
	 *
	 */
	public function value()
	{
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::root()
	 *
	 */
	public function root(NumberInterface $number) {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::round()
	 *
	 */
	public function round(RoundingMode $mode = NULL) {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::assertIsGreaterThan()
	 *
	 */
	public function assertIsGreaterThan(NumberInterface $number) {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::multiply()
	 *
	 */
	public function multiply(NumberInterface $number) {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::divide()
	 *
	 */
	public function divide(NumberInterface $number) {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::assertIsEqualTo()
	 *
	 */
	public function assertIsEqualTo(NumberInterface $number) {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::add()
	 *
	 */
	public function add(NumberInterface $number) {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::assertIsNegative()
	 *
	 */
	public function assertIsNegative() {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::subtract()
	 *
	 */
	public function subtract(NumberInterface $number) {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::assertIsGreaterOrEqualTo()
	 *
	 */
	public function assertIsGreaterOrEqualTo(NumberInterface $number) {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::createFrom()
	 *
	 */
	public function createFrom(NumberInterface $number) {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::assertIsSmallerThan()
	 *
	 */
	public function assertIsSmallerThan(NumberInterface $number) {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::power()
	 *
	 */
	public function power(NumberInterface $number) {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::assertIsPositive()
	 *
	 */
	public function assertIsPositive() {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::assertIsZero()
	 *
	 */
	public function assertIsZero() {
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \AGmakonts\STL\Number\NumberInterface::assertIsSmallerOrEqualTo()
	 *
	 */
	public function assertIsSmallerOrEqualTo(NumberInterface $number)
	{
	}
	/* (non-PHPdoc)
	 * @see \AGmakonts\STL\SimpleTypeInterface::__toString()
	 */
	public function __toString() {

		return $this->value();

	}

}

