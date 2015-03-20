<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 29.10.14
 * Time: 10:30
 */

namespace AGmakonts\STL\Number;

use AGmakonts\STL\Number\Exception\DivisionByZeroException;
use AGmakonts\STL\String\String;

class Integer extends AbstractNumber implements NumberInterface
{
    /**
     * @param array $value
     */
    protected function __construct(array $value)
    {
        $number = filter_var($value[0], FILTER_VALIDATE_INT);

        if (FALSE === $number) {

            throw new \InvalidArgumentException('Value is not an integer');
        }

        $this->value = $number;

    }

    /**
     * @param int $number
     *
     * @return \AGmakonts\STL\Number\Integer
     */
    static public function get($number = 0)
    {
        return self::getInstanceForValue($number);
    }

    /**
     * @param NumberInterface $from
     *
     * @return \AGmakonts\STL\Number\Integer
     */
    public function subtract(NumberInterface $from)
    {
        return self::get($this->value() - $from->value());
    }

    /**
     * @param NumberInterface $to
     *
     * @return \AGmakonts\STL\Number\Integer
     */
    public function add(NumberInterface $to)
    {
        return self::get($this->value() + $to->value());
    }

    /**
     * @param NumberInterface $by
     * @return \AGmakonts\STL\Number\Integer
     */
    public function divide(NumberInterface $by)
    {
        if(TRUE === $by->isZero()) {
            throw new DivisionByZeroException();
        }

        return self::get($this->value() / $by->value());
    }

    /**
     * @param NumberInterface $by
     * @return \AGmakonts\STL\Number\Integer
     */
    public function multiply(NumberInterface $by)
    {
        return self::get($this->value() * $by->value());
    }

    /**
     * @param NumberInterface $of
     * @return \AGmakonts\STL\Number\Integer
     */
    public function power(NumberInterface $of)
    {
        return self::get(pow($this->value(), $of->value()));
    }

    /**
     * @param NumberInterface $root
     * @return \AGmakonts\STL\Number\Integer
     */
    public function root(NumberInterface $root)
    {
        return self::get(pow($this->value(), 1/$root->value()));
    }

    /**
     * @return \AGmakonts\STL\Number\Integer
     */
    public function factorial()
    {

    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function isGreaterThan(NumberInterface $number)
    {
        return ($this->value() > $number->value());
    }

    public function isLessThan(NumberInterface $number)
    {
        return ($this->value() < $number->value());
    }

    /**
     * @param NumberInterface $number
     * @return bool
     */
    public function isGreaterOrEqualTo(NumberInterface $number)
    {
        return ($this->value() >= $number->value());
    }

    public function isLessOrEqualTo(NumberInterface $number)
    {
        return ($this->value() <= $number->value());
    }

    public function isEqualTo(NumberInterface $number)
    {
        return ($this->value() === $number->value());
    }

    public function isEven()
    {
        return (0 === $this->value() % 2);
    }

    public function isOdd()
    {
        return (FALSE === $this->isEven());
    }

    /**
     * @param NumberInterface $number
     * @return \AGmakonts\STL\Number\Integer
     */
    public function modulo(NumberInterface $number)
    {
        return Integer::get($this->value() % $number->value());
    }

    /**
     * @return \AGmakonts\STL\Number\Integer
     */
    public function absolute()
    {
        return self::get(abs($this->value()));
    }

    /**
     * @param \AGmakonts\STL\Number\Integer $base
     * @return \AGmakonts\STL\Number\Integer
     */
    public function convertedToBase(Integer $base)
    {

    }

    /**
     * @return Sign
     */
    public function sign()
    {
        return Sign::get(intval($this->isLessThan(Integer::get())));
    }

    /**\
     * @return boolean
     */
    public function isNegative()
    {
        return ($this->sign()->getValue() === Sign::NEGATIVE);
    }

    /**
     * @return boolean
     */
    public function isPositive()
    {
        return (FALSE === $this->isNegative());
    }

    /**
     * @return boolean
     */
    public function isZero()
    {
        return ($this->value() === 0);
    }

    /**
     * @param \AGmakonts\STL\Number\RoundingMode $mode
     *
     * @return \AGmakonts\STL\Number\Integer
     */
    public function round(RoundingMode $mode)
    {
        return self::get(round($this->value(), 0, $mode->getValue()));
    }

    /**
     * @return \AGmakonts\STL\Number\Integer
     */
    public function digitCount()
    {
        return self::get(String::get((string) $this->value())->length());
    }

    /**
     * @return \AGmakonts\STL\Number\Integer
     */
    public function decrement(){
        return self::get($this->value() - 1);
    }

    /**
     * @return \AGmakonts\STL\Number\Integer
     */
    public function increment(){
        return self::get($this->value() + 1);
    }
} 