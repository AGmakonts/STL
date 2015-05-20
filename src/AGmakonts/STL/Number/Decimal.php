<?php
/**
 * @author Mateusz Lisik <matt@procreative.eu>
 * @author Michał Nicz <michael@procreative.eu>
 */

namespace AGmakonts\STL\Number;


use AGmakonts\STL\String\String;

class Decimal extends AbstractNumber implements NumberInterface
{
    /**
     * @param array $value
     */
    public function __construct(array $value)
    {
        $number = filter_var($value[0], FILTER_VALIDATE_FLOAT);

        if (FALSE === $number) {
            throw new \InvalidArgumentException("Value is not an decimal");
        }

        $this->value = (string) $number;
    }

    /**
     * @param $number
     * @return Decimal
     */
    static public function get($number = 0)
    {
        return self::getInstanceForValue($number);
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $from
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function subtract(NumberInterface $from)
    {
        return self::get(bcsub($this->value(), $from->value(),10));
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $to
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function add(NumberInterface $to)
    {
        return self::get(bcadd($this->value(), $to->value(),10));
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $by
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function divide(NumberInterface $by)
    {
        return self::get(bcdiv($this->value(), $by->value(),10));
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $by
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function multiply(NumberInterface $by)
    {
        return self::get(bcmul($this->value(), $by->value()),10);
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $of
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function power(NumberInterface $of)
    {
        return self::get(bcpow($this->value(), $of->value(),10));
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $root
     *
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function root(NumberInterface $root)
    {
        return self::get(bcsqrt($this->value(), $root->value(),10));
    }

    /**
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function factorial()
    {
        // TODO: Implement factorial() method.
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function isGreaterThan(NumberInterface $number)
    {
        return 1 === bccomp($this->value(), $number->value(),10);
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     * @return bool
     */
    public function isLessThan(NumberInterface $number)
    {
        return -1 === bccomp($this->value(), $number->value(),10);
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function isGreaterOrEqualTo(NumberInterface $number)
    {
        return (0 === bccomp($this->value(), $number->value(),10) || (1 === bccomp($this->value(), $number->value(),10)));

    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function isLessOrEqualTo(NumberInterface $number)
    {
        return (0 === bccomp($this->value(), $number->value(),10) || (-1 === bccomp($this->value(), $number->value(),10)));

    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function isEqualTo(NumberInterface $number)
    {

        return (0 === bccomp($this->value(), $number->value(),10));

    }

    /**
     * @return bool
     */
    public function isEven()
    {
        return 0===bcdiv($this->value(), 2,10) ? TRUE : FALSE;
    }

    /**
     * @return bool
     */
    public function isOdd()
    {
        return !$this->isEven();
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function modulo(NumberInterface $number)
    {
        return self::get(bcmod($this->value(), $number->value()));
    }

    /**
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function absolute()
    {
        return self::get(abs($this->value()));
    }

    /**
     * @param \AGmakonts\STL\Number\Integer $base
     *
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function convertedToBase(Integer $base)
    {
        // TODO: Implement convertedToBase() method.
    }

    /**
     * @return \AGmakonts\STL\Number\Sign
     */
    public function sign()
    {
        return Sign::get(intval($this->isLessThan(Integer::get())));
    }

    /**
     * @return bool
     */
    public function isNegative()
    {
        return 0===bccomp($this->sign()->getValue(), Sign::NEGATIVE);
    }

    /**
     * @return bool
     */
    public function isPositive()
    {
        return (FALSE === $this->isNegative());
    }

    /**
     * @return bool
     */
    public function isZero()
    {

        return (0 === bccomp($this->value(), "0.0",10));
    }

    /**
     * @param \AGmakonts\STL\Number\RoundingMode $mode
     * @param int $precision
     * @return NumberInterface
     */
    public function round(RoundingMode $mode, $precision = 0)
    {
        return self::get(round($this->value(), $precision, $mode->getValue()));
    }

    /**
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function digitCount()
    {
        $string = str_replace('.', '', (string)$this->value());
        return self::get(String::get($string)->length());
    }
}