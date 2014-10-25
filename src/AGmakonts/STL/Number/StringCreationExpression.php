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
    private $rawExpression;

    /**
     *
     * @var Integer
     */
    private $numerator;

    /**
     *
     * @var Integer
     */
    private $denominator;

    /**
     *
     * @var Integer
     */
    private $integer;

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

        $this->rawExpression = $expression;

        $data = NULL;

        preg_match_all(self::PATTERN, $this->rawExpression(), $data);


        if(NULL === $data) {
            throw new InvalidFractionStringException($expression, 'Expression cannot be processed');
        }

        try {

            $this->processExpressionData($data);
        } catch (CorruptedStringExpressionException $ex) {

            throw new InvalidFractionStringException($expression, $ex->getMessage());
        }


    }

    /**
     *
     * @param array $data
     * @throws CorruptedStringExpressionException
     */
    private function processExpressionData(array $data)
    {

        $integer     = $this->getIntegerFromData ($data, 'integer' );
        $numerator   = $this->getIntegerFromData ($data, 'numerator' );
        $denominator = $this->getIntegerFromData ($data, 'denominator' );


        if(NULL === $numerator || NULL === $denominator) {
            throw new CorruptedStringExpressionException();
        }

        $this->integer     = $integer;
        $this->numerator   = $numerator;
        $this->denominator = $denominator;


    }

    /**
     *
     * @param array $data
     * @param string $part
     * @return Integer|NULL
     */
    private function getIntegerFromData(array $data, $part) {

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
        return $this->numerator;
    }

    /**
     *
     * @return Integer
     */
    public function denominator() {
        return $this->denominator;
    }

    /**
     *
     * @return Integer
     */
    public function integer() {
        return $this->integer;
    }

    /**
     *
     * @return string
     */
    public function rawExpression()
    {
        return $this->rawExpression;
    }

}

