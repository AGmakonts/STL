<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-10-28
 * Time: 23:29
 */

namespace AGmakonts\STL\Number;


use AGmakonts\STL\ValueObjectInterface;
use JsonSchema\Constraints\Number;

interface NumberInterface extends ValueObjectInterface
{
    /**
     * @param $number
     * @return NumberInterface
     */
    static public function get($number);

    public function subtract(NumberInterface $from);
    public function add(NumberInterface $to);
    public function divide(NumberInterface $by);
    public function multiply(NumberInterface $by);
    public function power(NumberInterface $of);
    public function root(NumberInterface $root);
    public function factorial();
    public function isGreaterThan(NumberInterface $number);
    public function isLessThan(NumberInterface $number);
    public function isGreaterOrEqualTo(NumberInterface $number);
    public function isLessOrEqualTo(NumberInterface $number);
    public function isEqualTo(NumberInterface $number);
    public function isEven();
    public function isOdd();
    public function modulo(NumberInterface $number);
    public function absolute();
    public function convertedToBase(Integer $base);
    public function sign();
    public function isNegative();
    public function isPositive();
    public function isZero();
    public function round(RoundingMode $mode);
    public function digitCount();



} 