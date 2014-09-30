<?php
use AGmakonts\STL\Number\Integer;
use AGmakonts\STL\Number\Exception\InvalidValueException;
use AGmakonts\STL\Number\Real;



/**
 * Integer test case.
 */
class IntegerTest extends PHPUnit_Framework_TestCase
{


    /**
     * Prepares the environment before running a test.
     */
    protected function setUp ()
    {
        parent::setUp();

        // TODO Auto-generated IntegerTest::setUp()


    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown ()
    {
        // TODO Auto-generated IntegerTest::tearDown()
        $this->Integer = null;

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
     * Tests Integer->__construct()
     * @expectedException AGmakonts\STL\Number\Exception\InvalidValueException
     */
    public function test__construct ()
    {



        $int = new Integer(-2.3);
    }

    /**
     * Tests Integer::createFrom()
     */
    public function testCreateFrom ()
    {
        $real = new Real(-2.54);

        $int = Integer::createFrom($real);

        self::assertInstanceOf(Integer::class, $int);
    }
}

