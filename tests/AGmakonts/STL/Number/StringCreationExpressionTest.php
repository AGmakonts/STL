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
     * Prepares the environment before running a test.
     */
    protected function setUp ()
    {
        parent::setUp();

        // TODO Auto-generated StringCreationExpressionTest::setUp()


    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown ()
    {
        // TODO Auto-generated StringCreationExpressionTest::tearDown()


        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct ()
    {
        // TODO Auto-generated constructor
    }

    /**
     * Tests StringCreationExpression->__construct()
     */
    public function test__construct ()
    {
        $expr = new StringCreationExpression('2 2/6');

        self::setExpectedException(CorruptedStringExpressionException::class);

        $error = new StringCreationExpression('d3s');
    }

    /**
     * Tests StringCreationExpression->getAsSimpleFraction()
     */
    public function testGetAsSimpleFraction ()
    {

        $expr = new StringCreationExpression('2/5');



        self::assertInstanceOf(Fraction::class, $expr->getAsSimpleFraction());
        self::assertEquals(2, $expr->getAsSimpleFraction()->getNumerator()->getValue());
        self::assertEquals(5, $expr->getAsSimpleFraction()->getDenominator()->getValue());
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
     * Tests StringCreationExpression->getNumerator()
     */
    public function testGetNumerator ()
    {
        // TODO Auto-generated StringCreationExpressionTest->testGetNumerator()
        $this->markTestIncomplete("getNumerator test not implemented");

        $this->StringCreationExpression->getNumerator(/* parameters */);
    }

    /**
     * Tests StringCreationExpression->getDenumerator()
     */
    public function testGetDenumerator ()
    {
        // TODO Auto-generated
        // StringCreationExpressionTest->testGetDenumerator()
        $this->markTestIncomplete("getDenumerator test not implemented");

        $this->StringCreationExpression->getDenumerator(/* parameters */);
    }

    /**
     * Tests StringCreationExpression->getInteger()
     */
    public function testGetInteger ()
    {
        // TODO Auto-generated StringCreationExpressionTest->testGetInteger()
        $this->markTestIncomplete("getInteger test not implemented");

        $this->StringCreationExpression->getInteger(/* parameters */);
    }

    /**
     * Tests StringCreationExpression->getRawExpression()
     */
    public function testGetRawExpression ()
    {
        // TODO Auto-generated
        // StringCreationExpressionTest->testGetRawExpression()
        $this->markTestIncomplete("getRawExpression test not implemented");

        $this->StringCreationExpression->getRawExpression(/* parameters */);
    }
}

