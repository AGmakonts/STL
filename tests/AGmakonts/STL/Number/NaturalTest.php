<?php
use AGmakonts\STL\Number\Natural;
use AGmakonts\STL\Number\Integer;
/**
 * Natural test case.
 */
class NaturalTest extends PHPUnit_Framework_TestCase
{



    /**
     * Prepares the environment before running a test.
     */
    protected function setUp ()
    {
        parent::setUp();

        // TODO Auto-generated NaturalTest::setUp()

    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown ()
    {
        // TODO Auto-generated NaturalTest::tearDown()


        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct ()
    {

    }

    /**
     * Tests Natural->__construct()
     * @expectedException AGmakonts\STL\Number\Exception\InvalidValueException
     */
    public function test__construct ()
    {
        $natural = new Natural(-8);
    }

    /**
     * Tests Natural->createFrom()
     */
    public function testCreateFrom ()
    {
        $negativeInteger = new Integer(-6);
        $positiveInteger = new Integer(99);

        $negativeTestNatural = Natural::createFrom($negativeInteger);
        $positiveTestNatural = Natural::createFrom($positiveInteger);

        self::assertEquals(0, $negativeTestNatural->value());
        self::assertEquals(99, $positiveTestNatural->value());
    }
}

