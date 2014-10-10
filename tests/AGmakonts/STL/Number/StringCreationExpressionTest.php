<?php

use AGmakonts\STL\Number\Exception\InvalidFractionStringException;
use AGmakonts\STL\Number\Exception\CorruptedStringExpressionException;
use AGmakonts\STL\Number\StringCreationExpression;
use AGmakonts\STL\Number\Fraction;
/**
 * StringCreationExpression test case.
 */
class StringCreationExpressionTest extends PHPUnit_Framework_TestCase
{





    /**
     * Constructs the test case.
     */
    public function __construct ()
    {

    }

    /**
     * Tests StringCreationExpression->__construct()
     *
     */
    public function test__construct ()
    {
        self::setExpectedException(InvalidFractionStringException::class);
        $expr = new StringCreationExpression('2 2/6');



        $error = new StringCreationExpression('d3s');
    }

    /**
     * Tests StringCreationExpression->getAsSimpleFraction()
     */
    public function testGetAsSimpleFraction ()
    {

        $expr = new StringCreationExpression('2/5');



        self::assertInstanceOf(Fraction::class, $expr->getAsSimpleFraction());
        self::assertEquals(2, $expr->getAsSimpleFraction()->numerator()->value());
        self::assertEquals(5, $expr->getAsSimpleFraction()->denominator()->value());
    }

    /**
     * Tests StringCreationExpression->getAsMixedNumber()
     */
    public function testGetAsMixedNumber ()
    {
        // TODO Auto-generated
        // StringCreationExpressionTest->testGetAsMixedNumber()
        $this->markTestIncomplete("getAsMixedNumber test not implemented");

        $this->StringCreationExpression->getAsMixedNumber(/* parameters */);
    }

    /**
     * Tests StringCreationExpression->numerator()
     */
    public function testGetNumerator ()
    {
        $sce = new StringCreationExpression("3/8");

        $numerator = $sce->numerator();

        self::assertEquals(3,$numerator->value());
    }

    /**
     * Tests StringCreationExpression->denominator()
     */
    public function testGetDenominator ()
    {
        $sce = new StringCreationExpression("3/8");

        $denominator = $sce->denominator();

        self::assertEquals(8,$denominator->value());
    }

    /**
     * Tests StringCreationExpression->integer()
     */
    public function testGetInteger ()
    {
        // TODO Auto-generated StringCreationExpressionTest->testGetInteger()
        $this->markTestIncomplete("integer test not implemented");

        $this->StringCreationExpression->getInteger(/* parameters */);
    }

    /**
     * Tests StringCreationExpression->rawExpression()
     */
    public function testGetRawExpression ()
    {
        // TODO Auto-generated
        // StringCreationExpressionTest->testGetRawExpression()
        $this->markTestIncomplete("rawExpression test not implemented");

        $this->StringCreationExpression->getRawExpression(/* parameters */);
    }


}

