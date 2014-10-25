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

    const PATTERN = "/(?'integer'\d*)\s?(?'numerator'\d+)\/(?'denominator'\d+)/";

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
    private $_denominator;

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

        preg_match_all(self::PATTERN, $this->rawExpression(), $data);


        if(NULL === $data) {
            throw new InvalidFractionStringException($expression, 'Expression cannot be processed');
        }

        try {

            $this->_processExpressionData($data);
        } catch (CorruptedStringExpressionException $ex) {

            throw new InvalidFractionStringException($expression, $ex->getMessage());
        }


    }

    /**
     *
     * @param array $data
     * @throws CorruptedStringExpressionException
     */
    private function _processExpressionData(array $data)
    {

        $integer     = $this->_getIntegerFromData ($data, 'integer' );
        $numerator   = $this->_getIntegerFromData ($data, 'numerator' );
        $denominator = $this->_getIntegerFromData ($data, 'denominator' );


        if(NULL === $numerator || NULL === $denominator) {
            throw new CorruptedStringExpressionException();
        }

        $this->_integer     = $integer;
        $this->_numerator   = $numerator;
        $this->_denominator = $denominator;


    }

    /**
     *
     * @param array $data
     * @param string $part
     * @return Integer|NULL
     */
    private function _getIntegerFromData(array $data, $part) {

        if(TRUE === isset($data[$part][0]) && ($data[$part][0] != "" || $data[$part][0] != 0)) {
            return new Integer((int) $data[$part][0]);
        } else {
            return NULL;
        }
    }


    public function getAsSimpleFraction()
    {
        if(NULL !== $this->integer()) {

            $numerator = new Integer(
                    $this->numerator()->value() +
                    $this->denominator()->value() *
                    $this->integer()->value()
            );

        } else {

            $numerator = $this->numerator();
        }

        return new Fraction($numerator, $this->denominator());

    }

    public function getAsMixedNumber()
    {

    }

    /**
     *
     * @return Integer
     */
    public function numerator() {
        return $this->_numerator;
    }

    /**
     *
     * @return Integer
     */
    public function denominator() {
        return $this->_denominator;
    }

    /**
     *
     * @return Integer
     */
    public function integer() {
        return $this->_integer;
    }

    /**
     *
     * @return string
     */
    public function rawExpression()
    {
        return $this->_rawExpression;
    }

}

