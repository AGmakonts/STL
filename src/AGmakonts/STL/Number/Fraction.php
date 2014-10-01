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
     * @param Integer $denumerator
     * @throws InvalidValueException
     */
    function __construct (Integer $numerator, Integer $denumerator = NULL)
    {
    	if(NULL === $denumerator) {
    		
    		$denumerator = new Integer(1);
    		
    	}
    	
        if(TRUE === $denumerator->assertIsZero()) {
        	
            throw new InvalidValueException($denumerator->getValue(), ['INT (>0)']);

        }


        $this->_numerator = $numerator;

        $this->_denominator = $denumerator;


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
    	return ($this->getValue() > $number->getValue());
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
    			$this->getNumerator()->multiply($fraction->getDenominator()).add(
    			$fraction->getNumerator()->multiply($this->getDenominator()));
    	} else {
    		$newNumeratorValue =
    			$this->getNumerator()->multiply($fraction->getDenominator()).subtract(
    			$fraction->getNumerator()->multiply($this->getDenominator()));
    	}

    	$newDenominatorValue = $this->getDenominator()->getValue() * $fraction->getDenominator()->getValue();
    		
    	$numerator   = new Integer($newNumeratorValue);
    	$denumarator = new Integer($newDenominatorValue);
    		
    	return $this->simplify(new Fraction($numerator, $denumarator));

	 
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
    	
    	$newNumerator = $this->getNumerator()->multiply($fraction->getDenominator());
    	$newDenominator = $this->getDenominator()->multiply($fraction->getNumerator());
    	
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
    	
    	$newNumerator = $this->getNumerator()->multiply($fraction->getNumerator());
    	$newDenumerator = $this->getDenominator()->multiply($fraction->getDenominator());
    	
    	return $this->simplify(new Fraction($newNumerator, $newDenumerator));
    }
    

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsEqualTo()
     *
     */
    public function assertIsEqualTo (NumberInterface $number)
    {
    	return ($this->getValue() === $number->getValue());
    }

    


    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsGreaterOrEqualTo()
     *
     */
    public function assertIsGreaterOrEqualTo (NumberInterface $number)
    {
    	return ($this->getValue() >= $number->getValue());
    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsSmallerThan()
     *
     */
    public function assertIsSmallerThan (NumberInterface $number)
    {
    	return ($this->getValue() < $number->getValue());
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
    	return ($this->getValue() <= $number->getValue());
    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsZero()
     *
     */
    public function assertIsZero ()
    {
    	return ($this->getNumerator()->assertIsZero());
    }
    
    public function assertIsInteger()
    {
    	return ($this->getDenominator()->getValue() === $this->getNumerator()->getValue());
    }
	/* (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::createFrom()
     */
    public static function createFrom (NumberInterface $number)
    {
		if($number instanceof Integer) {
			$fraction = new static($number);
		} elseif ($number instanceof Fraction) {
			$fraction = new static($number->getNumerator(), $number->getDenominator());
		} else {
			$fraction = new static(Integer::createFrom($number));
		}
		
		
		return $fraction;

    }
    
    /**
     * Simplify (recuce) fraction to 
     * greatest common divisor.
     * 
     * @param Fraction $fraction
     * @return Fraction
     */
    public function simplify(Fraction $fraction)
    {
    	$gcd = $this->_gcd($fraction);
    	
    	$numeratorValue   = $fraction->getNumerator()->getValue();
    	$denumeratorValue = $fraction->getDenominator()->getValue();
    	
    	$newNumerator   = new Integer($numeratorValue / $gcd->getValue());
    	$newDenumerator = new Integer($denumeratorValue / $gcd->getValue());

    	return new static($newNumerator, $newDenumerator);
    	
    }
    
    /**
     * Find greatest common divisor for 
     * numerator and denumerator of the Fraction
     * 
     * @param Fraction $fraction
     * @return Integer
     */
    private function _gcd(Fraction $fraction)
    {
    	$numerator   = abs($fraction->getNumerator()->getValue());
    	$denumerator = abs($fraction->getDenominator()->getValue());
    	
    	if($numerator > $denumerator) {
    		list($denumerator, $numerator) = [$numerator, $denumerator];
    	}
    	
    	if($denumerator === 0) {
    		return new Integer($numerator);
    	}
    	
    	$result = $numerator % $denumerator;
    	
    	while ($result > 0)
    	{
    		$numerator = $denumerator;
    		
    		$denumerator = $result;
    		
    		$result = $numerator % $denumerator;
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

	/* (non-PHPdoc)
	 * @see \AGmakonts\STL\SimpleTypeInterface::__toString()
	 */
	public function __toString() {
		
		return $this->getValue();
		
	}







}
