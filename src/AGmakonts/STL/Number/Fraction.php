<?php
namespace AGmakonts\STL\Number;

use AGmakonts\STL\Number\Exception\InvalidValueException;
use AGmakonts\STL\Number\Integer;
use AGmakonts\STL\Number\NumberInterface;
use AGmakonts\STL\Number\StringCreationExpression as StringExpression;
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
     * @param Integer $denominator
     *
     * @throws InvalidValueException
     */
    function __construct (Integer $numerator, Integer $denominator = NULL)
    {
        if(NULL === $denominator) {

            $denominator = new Integer(1);

        }

        if(TRUE === $denominator->assertIsZero()) {

            throw new InvalidValueException($denominator->value(), ['INT (>0)']);

        }


        $this->_numerator = $numerator;

        $this->_denominator = $denominator;


    }

    /**
     * 
     * Creates Fraction object from string
     * representation of the fraction.
     * 
     * Proper usage example:
     * <code>
     * <?php
     *  $fraction = Fraction::createFromString(new StringExpression("4 23/675"));
     *
     * </code>
     *
     * @param StringExpression $expression
     * @return Fraction
     */
    static public function createFromString(StringExpression $stringExpression)
    {
        return $stringExpression->getAsSimpleFraction();

    }

    /**
     * Get decimal value of the fraction.
     *
     */
    public function value ()
    {
        return $this->numerator() / $this->denominator();
    }

    /**
     * @return \AGmakonts\STL\Number\Integer
     */
    public function numerator ()
    {
        return $this->_numerator;
    }

    /**
     * @return \AGmakonts\STL\Number\Integer
     */
    public function denominator ()
    {
        return $this->_denominator;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::root()
     *
     */
    public function root(NumberInterface $number)
    {}

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsGreaterThan()
     *
     */
    public function assertIsGreaterThan (NumberInterface $number)
    {
        return ($this->value() > $number->value());
    }

   
    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::add()
     *
     */
    public function add (NumberInterface $number)
    {
        return $this->_addSubtract($number, TRUE);

    }
    
    /**
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::subtract()
     */
    public function subtract (NumberInterface $number)
    {
        return $this->_addSubtract($number, FALSE);
    }
    
    
     /**
     *
     * @param NumberInterface $number
     * @param boolean $add
     * @return Fraction
     */
     private function _addSubtract(NumberInterface $number, $add = TRUE) {


        $fraction = self::createFrom($number);

        if(TRUE === $add) {
            $newNumeratorValue =
                $this->numerator()->multiply($fraction->denominator()).add(
                $fraction->numerator()->multiply($this->denominator()));
        } else {
            $newNumeratorValue =
                $this->numerator()->multiply($fraction->denominator()).subtract(
                $fraction->numerator()->multiply($this->denominator()));
        }

        $newDenominatorValue = $this->denominator()->value() * $fraction->denominator()->value();

        $numerator   = new Integer($newNumeratorValue);
        $denominator = new Integer($newDenominatorValue);

        return $this->simplify(new Fraction($numerator, $denominator));


     }



    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::divide()
     *
     */
    public function divide (NumberInterface $number)
    {
        $fraction = self::createFrom($number);

        $newNumerator = $this->numerator()->multiply($fraction->denominator());
        $newDenominator = $this->denominator()->multiply($fraction->numerator());

        return $this->simplify(new Fraction($newNumerator, $newDenominator));

    }
    
    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::multiply()
     *
     */
    public function multiply (NumberInterface $number)
    {
        $fraction = self::createFrom($number);

        $newNumerator = $this->numerator()->multiply($fraction->numerator());
        $newDenominator = $this->denominator()->multiply($fraction->denominator());

        return $this->simplify(new Fraction($newNumerator, $newDenominator));
    }
    

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsEqualTo()
     *
     */
    public function assertIsEqualTo (NumberInterface $number)
    {
        return ($this->value() === $number->value());
    }

    


    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsGreaterOrEqualTo()
     *
     */
    public function assertIsGreaterOrEqualTo (NumberInterface $number)
    {
        return ($this->value() >= $number->value());
    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsSmallerThan()
     *
     */
    public function assertIsSmallerThan (NumberInterface $number)
    {
        return ($this->value() < $number->value());
    }

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
    {
        return ($this->value() <= $number->value());
    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsZero()
     *
     */
    public function assertIsZero ()
    {
        return ($this->numerator()->assertIsZero());
    }
    
    public function assertIsInteger()
    {
        return ($this->denominator()->assertIsEqualTo($this->numerator()));
    }
    /* (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::createFrom()
     */
    public static function createFrom (NumberInterface $number)
    {
        if($number instanceof Integer) {
            $fraction = new static($number);
        } elseif ($number instanceof Fraction) {
            $fraction = new static($number->numerator(), $number->denominator());
        } else {
            $fraction = new static(Integer::createFrom($number));
        }


        return $fraction;

    }
    
    /**
     * Simplify (reduce) fraction to
     * greatest common divisor.
     * 
     * @param Fraction $fraction
     * @return Fraction
     */
    public function simplify(Fraction $fraction)
    {
        $gcd = $this->_gcd($fraction);

        $numeratorValue   = $fraction->numerator()->value();
        $denominatorValue = $fraction->denominator()->value();

        $newNumerator   = new Integer($numeratorValue / $gcd->value());
        $newDenominator = new Integer($denominatorValue / $gcd->value());

        return new static($newNumerator, $newDenominator);

    }
    
    /**
     * Find greatest common divisor for 
     * numerator and denominator of the Fraction
     * 
     * @param Fraction $fraction
     * @return Integer
     */
    private function _gcd(Fraction $fraction)
    {
        $numerator   = abs($fraction->numerator()->value());
        $denominator = abs($fraction->denominator()->value());

        if($numerator > $denominator) {
            list($denominator, $numerator) = [$numerator, $denominator];
        }

        if($denominator === 0) {
            return new Integer($numerator);
        }

        $result = $numerator % $denominator;

        while ($result > 0)
        {
            $numerator = $denominator;

            $denominator = $result;

            $result = $numerator % $denominator;
        }

        return new Integer($result);

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
     * @return string
     */
    public function __toString() {

        return $this->value();

    }







}
