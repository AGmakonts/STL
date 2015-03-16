<?php
use AGmakonts\STL\Number\Decimal;
use AGmakonts\STL\Number\Integer;
use AGmakonts\STL\Number\RoundingMode;

/**
 * @author Mateusz Lisik <matt@procreative.eu>
 * @coversDefaultClass \AGmakonts\STL\Number\Decimal
 */
class DecimalTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorForInvalidStringParameter()
    {
        new Decimal([""]);
    }

    public function testConstructorForIntegerParameter()
    {
        $decimal = new Decimal([7]);
        $this->assertEquals(7, $decimal->value());
    }

    public function testConstructorForDecimalParameter()
    {
        $decimal = new Decimal([7.7]);
        $this->assertEquals(7.7, $decimal->value());
    }

    public function testGet()
    {
        $decimal = Decimal::get(7.654321);
        $this->assertEquals(7.654321, $decimal->value());
    }

    public function testSubtract()
    {
        $decimal = Decimal::get(7.76);
        $result = $decimal->subtract(Decimal::get(0.7));
        $this->assertEquals(7.06, $result->value());
    }

    public function testAdd()
    {
        $decimal = Decimal::get(7.00);
        $result = $decimal->add(Decimal::get(0.62));
        $this->assertEquals(7.62, $result->value());
    }

    public function testDivide()
    {
        $decimal = Decimal::get(4.00);
        $result = $decimal->divide(Decimal::get(2));
        $this->assertEquals(2.00, $result->value());
    }

    public function testMultiply()
    {
        $decimal = Decimal::get(4.00);
        $result = $decimal->multiply(Decimal::get(0.5));
        $this->assertEquals(2.00, $result->value());
    }

    public function testIsGreaterThan()
    {
        $decimal = Decimal::get(4.00);
        $result = $decimal->isGreaterThan(Decimal::get(4.000000005));
        $this->assertFalse($result);
    }

    public function testIsLessThan()
    {
        $decimal = Decimal::get(4.00);
        $result = $decimal->isLessThan(Decimal::get(4.000000005));
        $this->assertTrue($result);
    }

    public function testIsGreaterEqualOrEqualTo()
    {
        $decimal = Decimal::get(4.00);
        $result = $decimal->isGreaterOrEqualTo(Decimal::get(4.00000000));
        $this->assertTrue($result);
    }

    public function testIsLessOrEqualTo()
    {
        $decimal = Decimal::get(4.00);
        $result = $decimal->isLessOrEqualTo(Decimal::get(4.00000000));
        $this->assertTrue($result);
    }

    public function testIsEqualTo()
    {
        $decimal = Decimal::get(4.00);
        $result = $decimal->isEqualTo(Decimal::get(5.00));
        $this->assertFalse($result);
    }

    public function testIsEven()
    {
        $decimal = Decimal::get(4.99);
        $result = $decimal->isEven();
        $this->assertFalse($result);
    }

    public function testIsOdd()
    {
        $decimal = Decimal::get(4.99);
        $result = $decimal->isOdd();
        $this->assertTrue($result);
    }

    public function testModulo()
    {
        $decimal = Decimal::get(5);
        $result = $decimal->modulo(Integer::get(4));
        $this->assertEquals(1, $result->value());
    }

    public function testAbsolute()
    {
        $decimal = Decimal::get(-4.99);
        $result = $decimal->absolute();
        $this->assertEquals(4.99, $result->value());
    }

    /**
     * @dataProvider isNegativeProvider
     * @covers ::isNegative
     *
     * @param $decimal
     * @param $expected
     */
    public function testIsNegative($decimal, $expected)
    {
        $number = Decimal::get($decimal);

        self::assertTrue($expected === $number->isNegative());
    }

    public function isNegativeProvider()
    {
        return [
            [2.4  , FALSE  ],
            [1    , FALSE  ],
            [0    , FALSE  ],
            [-3.3 , TRUE  ],
            [-3   , TRUE  ],
        ];
    }

    /**
     * @dataProvider isPositiveProvider
     * @covers ::isPositive
     *
     * @param $decimal
     * @param $expected
     */
    public function testIsPositive($decimal, $expected)
    {
        $number = Decimal::get($decimal);

        self::assertTrue($expected === $number->isPositive());
    }

    public function isPositiveProvider()
    {
        return [
            [2.4  , TRUE  ],
            [1    , TRUE  ],
            [0    , TRUE  ],
            [-3.3 , FALSE  ],
            [-3   , FALSE  ],
        ];
    }

    /**
     * @covers ::isZero
     */
    public function testIsZero()
    {
        $decimal = Decimal::get(0.001);
        $result = $decimal->isZero();
        $this->assertFalse($result);
    }

    public function testRound()
    {
        $decimal = Decimal::get(4.094);
        $result = $decimal->round(RoundingMode::DOWN(), 2);
        $this->assertEquals(4.09, $result->value());
    }

    public function testDigitCount()
    {
        $decimal = Decimal::get(4.99);
        $result = $decimal->digitCount();
        $this->assertEquals(3, $result->value());
    }
}
