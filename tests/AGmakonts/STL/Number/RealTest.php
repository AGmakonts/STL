<?php
use AGmakonts\STL\Number\Real;
use AGmakonts\STL\Number\Integer;


/**
 * Real test case.
 */
class RealTest extends PHPUnit_Framework_TestCase
{



    /**
     * Prepares the environment before running a test.
     */
    protected function setUp ()
    {
        parent::setUp();

    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown ()
    {


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
     * Tests Real->value()
     */
    public function testValue()
    {
        $real = new Real(10);

        self::assertEquals(10, $real->value());
        self::assertNotEquals(100, $real->value());


    }

    /**
     * Tests Real->assertIsEqualTo()
     */
    public function testAssertIsEqualTo ()
    {
        $testReal = new Real(2);
        $goodReal = new Real(2);
        $badReal  = new Real(20);
        $badReal2 = new Real(20.2);

        self::assertTrue($testReal->assertIsEqualTo($goodReal));
        self::assertFalse($testReal->assertIsEqualTo($badReal));
        self::assertFalse($testReal->assertIsEqualTo($badReal2));





    }

    /**
     * Tests Real->assertIsGreaterThan()
     */
    public function testAssertIsGreaterThan ()
    {
        $testReal = new Real(100);
        $goodReal = new Real(80);
        $badReal  = new Real(100.02);
        $badReal2 = new Real(100);

        self::assertTrue($testReal->assertIsGreaterThan($goodReal));
        self::assertFalse($testReal->assertIsGreaterThan($badReal));
        self::assertFalse($testReal->assertIsGreaterThan($badReal2));
    }

    /**
     * Tests Real->assertIsGreaterOrEqualTo()
     */
    public function testAssertIsGreaterOrEqualTo ()
    {
    	
    	
        $testReal = new Real(100);

        $goodReal = new Real(100);
        $badReal  = new Real(100.02);
        $badReal2 = new Real(200);
        
        $comparisonResult = bccomp((string) $testReal->value(), (string) $badReal->value());

        self::assertTrue($testReal->assertIsGreaterOrEqualTo($goodReal));
        self::assertFalse($testReal->assertIsGreaterOrEqualTo($badReal), "result: " . print_r($comparisonResult, TRUE));
        self::assertFalse($testReal->assertIsGreaterOrEqualTo($badReal2));
    }

    /**
     * Tests Real->assertIsSmallerThan()
     */
    public function testAssertIsSmallerThan ()
    {
        $testReal = new Real(2);

        $goodReal = new Real(3);
        $badReal  = new Real(0);
        $badReal2 = new Real(2);

        self::assertTrue($testReal->assertIsSmallerThan($goodReal));
        self::assertFalse($testReal->assertIsSmallerThan($badReal));
        self::assertFalse($testReal->assertIsSmallerThan($badReal2));
    }

    /**
     * Tests Real->assertIsSmallerOrEqualTo()
     */
    public function testAssertIsSmallerOrEqualTo ()
    {
        $testReal = new Real(2);

        $goodReal = new Real(2);
        $badReal  = new Real(0);
        $badReal2 = new Real(1.99999999);

        self::assertTrue($testReal->assertIsSmallerOrEqualTo($goodReal));
        self::assertFalse($testReal->assertIsSmallerOrEqualTo($badReal));
        self::assertFalse($testReal->assertIsSmallerOrEqualTo($badReal2));
    }

    /**
     * Tests Real->assertIsZero()
     */
    public function testAssertIsZero ()
    {
        $zeroReal = new Real(0);
        $nonZeroReal = new Real(983);
        $floatReal = new Real(0.2303);

        self::assertTrue($zeroReal->assertIsZero());
        self::assertFalse($nonZeroReal->assertIsZero());
        self::assertFalse($floatReal->assertIsZero());
    }

    /**
     * Tests Real->add()
     */
    public function testAdd ()
    {
        $firstReal = new Real(22.5);
        $secondReal = new Real(10);

        self::assertEquals(32.5, $firstReal->add($secondReal)->value());
    }

    /**
     * Tests Real->subtract()
     */
    public function testSubtract ()
    {
        $firstReal = new Real(22.5);
        $secondReal = new Real(10);

        self::assertEquals(12.5, $firstReal->subtract($secondReal)->value());
    }

    /**
     * Tests Real->divide()
     */
    public function testDivide ()
    {
        $firstReal = new Real(100);
        $secondReal = new Real(8);

        self::assertEquals(12.5, $firstReal->divide($secondReal)->getValue());
    }

    /**
     * Tests Real->multiply()
     */
    public function testMultiply ()
    {
        $firstReal = new Real(3);
        $secondReal = new Real(-10);

        self::assertEquals(-30, $firstReal->multiply($secondReal)->value());
    }

    /**
     * Tests Real->power()
     */
    public function testPower ()
    {
        $firstReal = new Real(10);
        $secondReal = new Real(2.2);

        self::assertEquals(158.48931924611, $firstReal->power($secondReal)->value());
    }

    /**
     * Tests Real->root()
     */
    public function testRoot ()
    {
        $firstReal = new Real(4);
        $secondReal = new Real(2);

        self::assertEquals(2, $firstReal->root($secondReal)->value());
    }

    /**
     * Tests Real->round()
     */
    public function testRound ()
    {
        $firstReal = new Real(10.3433);

        self::assertEquals(10, $firstReal->round()->value());
    }

    /**
     * Tests Real::createFrom()
     */
    public function testCreateFrom ()
    {
        $int = new Integer(4);

        $real = Real::createFrom($int);

        self::assertInstanceOf(Real::class, $real);
        self::assertNotInstanceOf(Integer::class, $real);
    }
}

