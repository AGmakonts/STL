<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-10-28
 * Time: 23:29
 */

namespace AGmakonts\STL\Number;


use AGmakonts\STL\ValueObjectInterface;

interface NumberInterface extends ValueObjectInterface
{
    /**
     * @param $number
     * @return NumberInterface
     */
    static public function get($number);

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $from
     *
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function subtract(NumberInterface $from);

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $to
     *
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function add(NumberInterface $to);

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $by
     *
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function divide(NumberInterface $by);

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $by
     *
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function multiply(NumberInterface $by);

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $of
     *
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function power(NumberInterface $of);

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $root
     *
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function root(NumberInterface $root);

    /**
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function factorial();

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function isGreaterThan(NumberInterface $number);

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function isLessThan(NumberInterface $number);

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function isGreaterOrEqualTo(NumberInterface $number);

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function isLessOrEqualTo(NumberInterface $number);

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function isEqualTo(NumberInterface $number);

    /**
     * @return bool
     */
    public function isEven();

    /**
     * @return bool
     */
    public function isOdd();

    /**
     * @param \AGmakonts\STL\Number\NumberInterface $number
     *
     * @return bool
     */
    public function modulo(NumberInterface $number);

    /**
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function absolute();

    /**
     * @param \AGmakonts\STL\Number\Integer $base
     *
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function convertedToBase(Integer $base);

    /**
     * @return \AGmakonts\STL\Number\Sign
     */
    public function sign();

    /**
     * @return bool
     */
    public function isNegative();

    /**
     * @return bool
     */
    public function isPositive();

    /**
     * @return bool
     */
    public function isZero();

    /**
     * @param \AGmakonts\STL\Number\RoundingMode $mode
     *
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function round(RoundingMode $mode);

    /**
     * @return \AGmakonts\STL\Number\NumberInterface
     */
    public function digitCount();
}