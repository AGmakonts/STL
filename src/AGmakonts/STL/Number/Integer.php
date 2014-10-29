<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 29.10.14
 * Time: 10:30
 */

namespace AGmakonts\STL\Number;


use AGmakonts\STL\Number\Exception\InvalidTypeException;

class Integer extends AbstractNumber implements NumberInterface
{
    /**
     * @param array $value
     */
    protected function __construct(array $value)
    {

    }

    /**
     * @param $number
     * @return \AGmakonts\STL\Number\Integer
     */
    static public function get($number = 0)
    {
        return self::getInstanceForValue($number);
    }

    public function subtract(NumberInterface $from)
    {
        // TODO: Implement subtract() method.
    }

    public function add(NumberInterface $to)
    {
        // TODO: Implement add() method.
    }

    public function divide(NumberInterface $by)
    {
        // TODO: Implement divide() method.
    }

    public function multiply(NumberInterface $by)
    {
        // TODO: Implement multiply() method.
    }

    public function power(NumberInterface $of)
    {
        // TODO: Implement power() method.
    }

    public function root(NumberInterface $root)
    {
        // TODO: Implement root() method.
    }

    public function factorial()
    {
        // TODO: Implement factorial() method.
    }

    public function isGreaterThan(NumberInterface $number)
    {
        // TODO: Implement isGreaterThan() method.
    }

    public function isLessThan(NumberInterface $number)
    {
        // TODO: Implement isLessThan() method.
    }

    public function isGreaterOrEqualTo(NumberInterface $number)
    {
        // TODO: Implement isGreaterOrEqualTo() method.
    }

    public function isLessOrEqualTo(NumberInterface $number)
    {
        // TODO: Implement isLessOrEqualTo() method.
    }

    public function isEqualTo(NumberInterface $number)
    {
        // TODO: Implement isEqualTo() method.
    }

    public function isEven()
    {
        // TODO: Implement isEven() method.
    }

    public function isOdd()
    {
        // TODO: Implement isOdd() method.
    }

    public function modulo(NumberInterface $number)
    {
        // TODO: Implement modulo() method.
    }

    public function absolute()
    {
        // TODO: Implement absolute() method.
    }

    public function convertedToBase(Integer $base)
    {
        // TODO: Implement convertedToBase() method.
    }

    public function sign()
    {
        // TODO: Implement sign() method.
    }

    public function isNegative()
    {
        // TODO: Implement isNegative() method.
    }

    public function isPositive()
    {
        // TODO: Implement isPositive() method.
    }

    public function isZero()
    {
        // TODO: Implement isZero() method.
    }

    public function round(RoundingMode $mode)
    {
        // TODO: Implement round() method.
    }

    public function digitCount()
    {
        // TODO: Implement digitCount() method.
    }


} 