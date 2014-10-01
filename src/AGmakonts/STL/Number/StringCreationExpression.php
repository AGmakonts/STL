<?php

namespace AGmakonts\STL\Number;

use AGmakonts\STL\Number\Exception\InvalidFractionStringException;
use AGmakonts\STL\Number\Exception\CorruptedStringExpressionException;
use AGmakonts\STL\Number\Integer;
/**
 *
 * @author Adam
 *
 */
class StringCreationExpression
{

	const PATTERN = "/(?'integer'\d*)\s?(?'numerator'\d+)\/(?'denumerator'\d+)/";

	/**
	 *
	 * @var string
	 */
	private $_rawExpression;

	/**
	 *
	 * @var Integer
	 */
	private $_numerator;

	/**
	 *
	 * @var Integer
	 */
	private $_denumerator;

	/**
	 *
	 * @var Integer
	 */
	private $_integer;

	/**
	 *
	 * @param string $expression
	 * @throws InvalidFractionStringException
	 */
	public function __construct($expression)
	{
		if(FALSE === is_string($expression) &&
		   TRUE  === ctype_space($expression) &&
		   TRUE  === empty($expression)) {

		   	throw new InvalidFractionStringException($expression, 'Expression is not a string or it\'s empty');

		}

		$this->_rawExpression = $expression;

		$data = NULL;

		preg_match_all(self::PATTERN, $this->getRawExpression(), $data);
		
		
		if(NULL === $data) {
			throw new InvalidFractionStringException($expression, 'Expression cannot be procesed');
		}

		$this->_processExpressionData($data);

	}

	/**
	 *
	 * @param array $data
	 * @throws CorruptedStringExpressionException
	 */
	private function _processExpressionData(array $data)
	{
		$integer     = NULL;
		$numerator   = NULL;
		$denumerator = NULL;



		$integer     = $this->_getIntegerFromData ($data, 'integer' );
		$numerator   = $this->_getIntegerFromData ($data, 'numerator' );
		$denumerator = $this->_getIntegerFromData ($data, 'denumerator' );


		if(NULL === $numerator || NULL === $denumerator) {
			throw new CorruptedStringExpressionException();
		}

		$this->_integer     = $integer;
		$this->_numerator   = $numerator;
		$this->_denumerator = $denumerator;


	}
	
	/**
	 * 
	 * @param array $data
	 * @param string $part
	 * @return Integer|NULL
	 */
	private function _getIntegerFromData(array $data, $part) {
	 	
		if(($data[$part] != "" || $data[$part] != 0) && is_numeric($data[$part])) {
			return new Integer((int) $data[$part]);
		} else {
			return NULL;
		}
	}


	public function getAsSimpleFraction()
	{
		if(NULL !== $this->getInteger()) {

			$numerator = new Integer(
					$this->getNumerator()->getValue() +
					$this->getDenumerator()->getValue() *
					$this->getInteger()->getValue()
			);

		}

		return new Fraction($numerator, $this->getDenumerator());

	}

	public function getAsMixedNumber()
	{

	}

	/**
	 *
	 * @return Integer
	 */
	public function getNumerator() {
		return $this->_numerator;
	}

	/**
	 *
	 * @return Integer
	 */
	public function getDenumerator() {
		return $this->_denumerator;
	}

	/**
	 *
	 * @return Integer
	 */
	public function getInteger() {
		return $this->_integer;
	}

	/**
	 *
	 * @return string
	 */
	public function getRawExpression()
	{
		return $this->_rawExpression;
	}

}

