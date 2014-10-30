<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 29.10.14
 * Time: 10:30
 */

namespace AGmakonts\STL\Number;

class Integer extends AbstractNumber implements NumberInterface
{
    /**
     * @param array $value
     */
    protected function __construct(array $value)
    {
        $number = filter_var($value[0], FILTER_VALIDATE_INT);

        if (FALSE === $number) {

            throw new \InvalidArgumentException("Value is not an integer");
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
        // TODO: Implement divide() method.
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
        // TODO: Implement power() method.
    }

    /**
     * @param NumberInterface $root
     * @return \AGmakonts\STL\Number\Integer
     */
    public function root(NumberInterface $root)
    {
        // TODO: Implement root() method.
    }

    /**
     * @return \AGmakonts\STL\Number\Integer
     */
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

    /**
     * @param NumberInterface $number
     * @return \AGmakonts\STL\Number\Integer
     */
    public function modulo(NumberInterface $number)
    {
        // TODO: Implement modulo() method.
    }

    /**
     * @return \AGmakonts\STL\Number\Integer
     */
    public function absolute()
    {
        // TODO: Implement absolute() method.
    }

    /**
     * @param \AGmakonts\STL\Number\Integer $base
     * @return \AGmakonts\STL\Number\Integer
     */
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