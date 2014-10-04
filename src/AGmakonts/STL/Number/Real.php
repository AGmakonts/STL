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

        $this->_value = (float) $value;
    }

    /*
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::value()
     */
    public function value ()
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
    	$scale = max(strlen((string) $this->value()), strlen((string) $number->value()));
    	
    	$comparisonResult = bccomp((string) $this->value(), (string) $number->value(), $scale);

        $result = in_array($comparisonResult, $operator->valueAsArray());

        return $result;
    }

    public function assertIsZero()
    {
        return ($this->value() == 0);
    }

    /*
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::add()
     */
    public function add(NumberInterface $number)
    {
        return new static($this->value() + $number->value());
    }

    /*
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::subtract()
     */
    public function subtract (NumberInterface $number)
    {
        return new static($this->value() - $number->value());
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

        return new static($this->value() / $number->value());
    }

    /*
     *
     * @return NumberInterface
     */
    public function multiply(NumberInterface $number)
    {
        return new static($this->value() * $number->value());
    }

    /*
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::power()
     */
    public function power(NumberInterface $number)
    {
        return new static(pow($this->value(), $number->value()));
    }

    /*
     * (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::root()
     */
    public function root(NumberInterface $number)
    {
        return new static(pow($this->value(), 1 / $number->value()));
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

        return new static(round($this->value(), 0, $mode->getValue()));
    }

	/* (non-PHPdoc)
     * @see \AGmakonts\STL\Number\NumberInterface::createFrom()
     */
    static public function createFrom(NumberInterface $number)
    {
        return new static($number->value());

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
    	return (FALSE === boolval($this->assertIsPositive()));
    }

    /**
     * Return 0 for negative number and 1 for positive
     *
     * @return integer
     */
    private function _getSign()
    {
    	return min(1, max(0, (is_nan($this->value()) || $this->value() == 0) ? 0 : $this->value() * INF));
    }


    /**
     *
     * @return Real
     */
    public function getDigitCount()
    {
    	$digits = strlen((string) $this->value());

    	return new static($digits);
    }


	/* (non-PHPdoc)
	 * @see \AGmakonts\STL\SimpleTypeInterface::__toString()
	 */
	public function __toString() {
		
		return $this->value();
		
	}


}
