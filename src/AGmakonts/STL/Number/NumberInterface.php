<?php
namespace AGmakonts\STL\Number;

/**
 *
 * @author adamgrabek
 *
 */
interface NumberInterface
{

    public function getValue();

    public function assertIsGreaterThan(NumberInterface $number);

    public function assertIsGreaterOrEqualTo(NumberInterface $number);

    public function assertIsSmallerThan(NumberInterface $number);

    public function assertIsSmallerOrEqualTo(NumberInterface $number);

    public function assertIsEqualTo(NumberInterface $number);

    public function subtract(NumberInterface $number);

    public function add(NumberInterface $number);

    public function multiply(NumberInterface $number);

    public function divide(NumberInterface $number);

    public function power(NumberInterface $number);

    public function root(NumberInterface $number);

    public function assertIsZero();
    
    public function round(RoundingMode $mode = NULL);
    
    public function assertIsPositive();
    
    public function assertIsNegative();

    public static function createFrom(NumberInterface $number);

}
