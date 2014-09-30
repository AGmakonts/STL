<?php
namespace AGmakonts\STL\Number;

use AGmakonts\STL\Number\Exception\InvalidValueException;
use AGmakonts\STL\Number\Integer;
use AGmakonts\STL\Number\NumberInterface;
/**
 *
 * @author adamgrabek
 *
 */
class Fraction implements NumberInterface
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
    private $_denominator;

    /**
     *
     * @param Integer $numerator
     * @param Integer $denumerator
     * @throws InvalidValueException
     */
    function __construct (Integer $numerator, Integer $denumerator)
    {
        if(TRUE === $denumerator->assertIsZero()) {
            throw new InvalidValueException($denumerator->getValue(), ['INT (>0)']);

        }

        $this->_numerator = $numerator;

        $this->_denominator = $denumerator;


    }

    /**
     * Creates Fraction object from string
     * representation of the fraction.
     * This method cannot create mixed number and
     * following construction is forbidden:
     * <code>
     * "2 23/45"
     * </code>
     * Proper usage example:
     * <code>
     * <?php
     *  $fraction = Fraction::createFromString("23/675");
     *
     * </code>
     *
     * @param string $expression
     */
    static public function createFromString($expression)
    {

    }



    /**
     * Get decimal value of the fraction.
     *
     */
    public function getValue ()
    {
        return $this->getNumerator() / $this->getDenominator();
    }

    /**
     *
     * @return the Integer
     */
    public function getNumerator ()
    {
        return $this->_numerator;
    }

    /**
     *
     * @return the Integer
     */
    public function getDenominator ()
    {
        return $this->_denominator;
    }

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

}
