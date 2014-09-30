<?php
namespace AGmakonts\STL\Number;
use AGmakonts\STL\Number\Exception\InvalidValueException;
use AGmakonts\STL\Number\Exception\DivisionByZeroException;
use AGmakonts\STL\Number\NumberInterface;
use AGmakonts\STL\Number\RoundingMode;
use AGmakonts\STL\Number\ComparisonOperator;

/**
 *
 * @author adamgrabek
 *
 */
class Real implements NumberInterface
{
	
    /**
     *
     * @var float
     */
    private $_value;

    /**
     * Create instance of Real Number.
     *
     * @param float $number
     * @throws InvalidValueException
     */
    public function __construct ($number)
    {
        $value = filter_var($number, FILTER_VALIDATE_FLOAT);

        if (FALSE === $value) {

            throw new InvalidValueException($number, ['FLOAT']);
        }

        $this->_value = $value;
    }

    /*
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::getValue()
     */
    public function getValue ()
    {
        return $this->_value;
    }

    /*
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::isEqualTo()
     */
    public function assertIsEqualTo (NumberInterface $number)
    {
        return $this->_compare($number, ComparisonOperator::get(ComparisonOperator::EQUAL));
    }

    /*
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::isGreaterThan()
     */
    public function assertIsGreaterThan (NumberInterface $number)
    {
        return $this->_compare($number, ComparisonOperator::get(ComparisonOperator::GREATER));
    }


    /* (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsGreaterOrEqualTo()
     */
    public function assertIsGreaterOrEqualTo (NumberInterface $number)
    {
        return $this->_compare($number, ComparisonOperator::get(ComparisonOperator::GREATER_EQUAL));

    }

	/*
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::isSmallerThan()
     */
    public function assertIsSmallerThan (NumberInterface $number)
    {
        return $this->_compare($number, ComparisonOperator::get(ComparisonOperator::SMALLER));
    }



    /* (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::assertIsSmallerOrEqualTo()
     */
    public function assertIsSmallerOrEqualTo (NumberInterface $number)
    {
        return $this->_compare($number, ComparisonOperator::get(ComparisonOperator::SMALLER_EQUAL));

    }

    /**
     * Compare current value in NumberInterface Object to second one.
     *
     * @param NumberInterface $number
     * @param ComparisonOperator $operator
     * @return boolean
     */
	private function _compare(NumberInterface $number, ComparisonOperator $operator)
    {
        switch ($operator->getValue()) {

            case ComparisonOperator::EQUAL :
                $result = ($this->getValue() === $number->getValue());
                break;

            case ComparisonOperator::GREATER :
                $result = ($this->getValue() > $number->getValue());
                break;

            case ComparisonOperator::GREATER_EQUAL :
                $result = ($this->getValue() >= $number->getValue());
                break;

            case ComparisonOperator::SMALLER :
                $result = ($this->getValue() < $number->getValue());
                break;

            case ComparisonOperator::SMALLER_EQUAL :
                $result = ($this->getValue() <= $number->getValue());
                break;

            default:
                $result = FALSE;

        }

        return $result;
    }

    public function assertIsZero()
    {
        return ($this->getValue() === 0);
    }

    /*
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::add()
     */
    public function add (NumberInterface $number)
    {
        return new static($this->getValue() + $number->getValue());
    }

    /*
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::subtract()
     */
    public function subtract (NumberInterface $number)
    {
        return new static($this->getValue() - $number->getValue());
    }

    /**
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::divide()
     */
    public function divide (NumberInterface $number)
    {

        if(TRUE === $number->assertIsZero()) {

            throw new DivisionByZeroException();

        }

        return new static($this->getValue() / $number->getValue());
    }

    /*
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::multiply()
     */
    public function multiply(NumberInterface $number)
    {
        return new static($this->getValue() * $number->getValue());
    }

    /*
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::power()
     */
    public function power(NumberInterface $number)
    {
        return new static(pow($this->getValue(), $number->getValue()));
    }

    /*
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::root()
     */
    public function root(NumberInterface $number)
    {
        return new static(pow($this->getValue(), 1 / $number->getValue()));
    }

    /**
     * Get rounded value
     *
     * @param RoundingMode $mode
     * @return NumberInterface
     */
    public function round(RoundingMode $mode = NULL)
    {
    	if(NULL === $mode) {
    		
    		$mode = RoundingMode::get(RoundingMode::HALF_EVEN);
    		
    	}
    	
        return new static(round($this->getValue(), 0, $mode->getValue()));
    }

	/* (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::createFrom()
     */
    static public function createFrom(NumberInterface $number)
    {
        return new static($number->getValue());

    }
    
    /**
     * Check if number is positive
     * 
     * @return boolean
     */
    public function assertIsPositive()
    {
    	return boolval($this->_getSign());
    }
    
    /**
     * Check if number is negative
     * 
     * @return boolean
     */
    public function assertIsNegative()
    {
    	return (FALSE === $this->assertIsPositive());
    }
    
    /**
     * Return 0 for negative number and 1 for positive
     * 
     * @return integer
     */
    private function _getSign()
    {
    	return min(1, max(0, (is_nan($this->getValue()) or $this->getValue() == 0) ? 0 : $this->getValue() * INF));
    }



}
