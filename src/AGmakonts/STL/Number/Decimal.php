<?php
namespace AGmakonts\STL\Number;
use AGmakonts\STL\Number\NumberInterface;
use AGmakonts\STL\Number\Integer;
use AGmakonts\STL\Number\RoundingMode;

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
     * @var Integer
     */
    private $_denumerator;

    /**
     *
     * @var Integer
     */
    private $_precision;

    /**
     */
    function __construct (Integer $numerator, Integer $denumerator, Integer $precision = NULL)
    {
    	
    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::getValue()
     *
     */
    public function getValue ()
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
        // TODO Auto-generated method stub

    }
	/* (non-PHPdoc)
	 * @see \AGmakonts\STL\Number\NumberInterface::round()
	 */
	public function round(RoundingMode $mode = NULL) {
		// TODO Auto-generated method stub
		
	}

	/* (non-PHPdoc)
	 * @see \AGmakonts\STL\Number\NumberInterface::assertIsPositive()
	 */
	public function assertIsPositive() {
		// TODO Auto-generated method stub
		
	}

	/* (non-PHPdoc)
	 * @see \AGmakonts\STL\Number\NumberInterface::assertIsNegative()
	 */
	public function assertIsNegative() {
		// TODO Auto-generated method stub
		
	}



}
