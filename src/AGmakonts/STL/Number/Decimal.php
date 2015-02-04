<?php
/**
 * @author Mateusz Lisik <matt@procreative.eu>
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

        $this->value = $number;
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
        return self::get($this->value() - $from->value());
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $to
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function add(NumberInterface $to)
    {
        return self::get($this->value() + $to->value());
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $by
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function divide(NumberInterface $by)
    {
        return self::get($this->value() / $by->value());
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $by
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function multiply(NumberInterface $by)
    {
        return self::get($this->value() * $by->value());
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $of
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function power(NumberInterface $of)
    {
        return self::get(pow($this->value(), $of->value()));
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $root
     *
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function root(NumberInterface $root)
    {
        return self::get(pow($this->value(), 1 / $root->value()));
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
        return $this->value() > $number->value();
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     * @return bool
     */
    public function isLessThan(NumberInterface $number)
    {
        return $this->value() < $number->value();
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function isGreaterOrEqualTo(NumberInterface $number)
    {
        return $this->value() >= $number->value();
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function isLessOrEqualTo(NumberInterface $number)
    {
        return $this->value() <= $number->value();
    }

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function isEqualTo(NumberInterface $number)
    {
        return $this->value() === $number->value();
    }

    /**
     * @return bool
     */
    public function isEven()
    {
        return $this->value() % 2 ? TRUE : FALSE;
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
        return self::get($this->value() % $number->value());
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
        return Sign::get(intval($this->isLessOrEqualTo(Integer::get())));
    }

    /**
     * @return bool
     */
    public function isNegative()
    {
        return ($this->sign()->getValue() === Sign::NEGATIVE);
    }

    /**
     * @return bool
     */
    public function isPositive()
    {
        return ($this->sign()->getValue() === Sign::POSITIVE);
    }

    /**
     * @return bool
     */
    public function isZero()
    {
        return ($this->value() === 0);
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
        $string = str_replace('.', '', (string) $this->value());
        return self::get(String::get($string)->length());
    }
}