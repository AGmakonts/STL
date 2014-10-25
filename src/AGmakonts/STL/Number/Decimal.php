<?php
namespace AGmakonts\STL\Number;
use AGmakonts\STL\Number\NumberInterface;
use AGmakonts\STL\Number\Integer;
use AGmakonts\STL\Number\RoundingMode;
use AGmakonts\STL\Number\Natural;

/**
 *
 * @author adamgrabek
 *
 */
class Decimal implements NumberInterface
{
    /**
     *
     * @var Integer
     */
    private $_numerator;

    /**
     *
     * @var Natural
     */
    private $_denominator;

    /**
     *
     * @var Integer
     */
    private $_precision;

    /**
     */
    function __construct (Integer $numerator, Natural $denumerator, Integer $precision = NULL)
    {
        $this->_numerator = $numerator;

        if(NULL !== $precision) {

            $tempReal = Natural::createFrom($denumerator);

            $tempDivider = new Real(10);

            $tempReal->divide($tempDivider->power($precision))->round(RoundingMode::get(RoundingMode::HALF_DOWN));


            $this->_denominator = $tempReal;
            $this->_precision   = $precision;

        } else {

            $this->_denominator = $denumerator;
            $this->_precision   = Integer::createFrom($denumerator->getDigitCount());

        }


    }



    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::value()
     *
     */
    public function value ()
    {}

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::root()
     *
     */
    public function root (NumberInterface $number)
    {}

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsGreaterThan()
     *
     */
    public function assertIsGreaterThan (NumberInterface $number)
    {}

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::multiply()
     *
     */
    public function multiply (NumberInterface $number)
    {}

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::divide()
     *
     */
    public function divide (NumberInterface $number)
    {}

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsEqualTo()
     *
     */
    public function assertIsEqualTo (NumberInterface $number)
    {}

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::add()
     *
     */
    public function add (NumberInterface $number)
    {}

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::subtract()
     *
     */
    public function subtract (NumberInterface $number)
    {}

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsGreaterOrEqualTo()
     *
     */
    public function assertIsGreaterOrEqualTo (NumberInterface $number)
    {}

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsSmallerThan()
     *
     */
    public function assertIsSmallerThan (NumberInterface $number)
    {}

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::power()
     *
     */
    public function power (NumberInterface $number)
    {}

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsSmallerOrEqualTo()
     *
     */
    public function assertIsSmallerOrEqualTo (NumberInterface $number)
    {}

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsZero()
     *
     */
    public function assertIsZero ()
    {}
    /* (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::createFrom()
     */
    public static function createFrom (NumberInterface $number)
    {


    }
    /* (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::round()
     */
    public function round(RoundingMode $mode = NULL) {


    }

    /* (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsPositive()
     */
    public function assertIsPositive() {


    }

    /* (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsNegative()
     */
    public function assertIsNegative() {


    }

    /**
     *
     * @return \AGmakonts\STL\Number\Integer
     */
    public function numerator ()
    {
        return $this->_numerator;
    }

    /**
     *
     * @return \AGmakonts\STL\Number\Natural
     */
    public function denominator ()
    {
        return $this->_denominator;
    }

    /**
     *
     * @return \AGmakonts\STL\Number\Integer
     */
    public function precision ()
    {
        return $this->_precision;
    }


    /* (non-PHPdoc)
     * @see \AGmakonts\STL\SimpleTypeInterface::__toString()
     */
    public function __toString() {

        return $this->value();

    }





}
