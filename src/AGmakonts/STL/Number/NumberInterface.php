<?php
namespace AGmakonts\STL\Number;

use AGmakonts\STL\SimpleTypeInterface;
/**
 *
 * @author adamgrabek
 *
 */
interface NumberInterface extends SimpleTypeInterface
{


    /**
     * 
     * @param NumberInterface $number
     * @return boolean
     */
    public function assertIsGreaterThan(NumberInterface $number);

    /**
     *
     * @param NumberInterface $number
     * @return boolean
     */
    public function assertIsGreaterOrEqualTo(NumberInterface $number);

    /**
     *
     * @param NumberInterface $number
     * @return boolean
     */
    public function assertIsSmallerThan(NumberInterface $number);

    /**
     *
     * @param NumberInterface $number
     * @return boolean
     */
    public function assertIsSmallerOrEqualTo(NumberInterface $number);

    /**
     *
     * @param NumberInterface $number
     * @return boolean
     */
    public function assertIsEqualTo(NumberInterface $number);

    /**
     * 
     * @param NumberInterface $number
     * @return NumberInterface
     */
    public function subtract(NumberInterface $number);

    /**
     *
     * @param NumberInterface $number
     * @return NumberInterface
     */
    public function add(NumberInterface $number);

    /**
     *
     * @param NumberInterface $number
     * @return NumberInterface
     */
    public function multiply(NumberInterface $number);

    /**
     *
     * @param NumberInterface $number
     * @return NumberInterface
     */
    public function divide(NumberInterface $number);

    /**
     *
     * @param NumberInterface $number
     * @return NumberInterface
     */
    public function power(NumberInterface $number);

    /**
     *
     * @param NumberInterface $number
     * @return NumberInterface
     */
    public function root(NumberInterface $number);

    /**
     *
     * @return boolean
     */
    public function assertIsZero();
    
    /**
     *
     * @param NumberInterface $number
     * @return NumberInterface
     */
    public function round(RoundingMode $mode = NULL);
    
    /**
     *
     * @return boolean
     */
    public function assertIsPositive();
    
    /**
     *
     * @return boolean
     */
    public function assertIsNegative();

    /**
     *
     * @param NumberInterface $number
     * @return NumberInterface
     */
    public static function createFrom(NumberInterface $number);
    

}
