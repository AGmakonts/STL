<?php

/**
 * @coversDefaultClass \AGmakonts\STL\Number\Integer
 */
class IntegerTest extends PHPUnit_Framework_TestCase
{


    /**
     * @dataProvider subtractProvider
     * @covers ::subtract
     */
    public function testSubtract($int1, $int2, $int3)
    {
        $starter  = \AGmakonts\STL\Number\Integer::get($int1);
        $subtract = \AGmakonts\STL\Number\Integer::get($int2);

        self::assertEquals($int3, $starter->subtract($subtract)->value());
    }

    public function subtractProvider()
    {
        return [
            [10,
             2,
             8],
            [5,
             5,
             0],
            [10,
             20,
             -10],
            [5,
             0,
             5]
        ];
    }

    /**
     * @dataProvider addProvider
     * @covers ::add
     */
    public function testAdd($first, $second, $expected)
    {
        $integerOne = \AGmakonts\STL\Number\Integer::get($first);
        $integerTwo = \AGmakonts\STL\Number\Integer::get($second);

        self::assertEquals($expected, $integerOne->add($integerTwo)->value());
    }

    public function addProvider()
    {
        return [
            [10,
             10,
             20],
            [0,
             10,
             10],
            [0,
             0,
             0],
            [-4,
             2,
             -2]
        ];
    }

    /**
     * @dataProvider multiplyProvider
     * @covers ::multiply
     */
    public function testMultiply($first, $second, $expected)
    {
        $integerOne = \AGmakonts\STL\Number\Integer::get($first);
        $integerTwo = \AGmakonts\STL\Number\Integer::get($second);

        self::assertEquals($expected, $integerOne->multiply($integerTwo)->value());
    }

    public function multiplyProvider()
    {
        return [
            [1,
             10,
             10],
            [2,
             10,
             20],
            [0,
             10,
             0]
        ];
    }

    /**
     * @dataProvider divideProvider
     * @covers ::divide
     */
    public function testDivide($first, $second, $expected)
    {
        $integerOne = \AGmakonts\STL\Number\Integer::get($first);
        $integerTwo = \AGmakonts\STL\Number\Integer::get($second);

        self::assertEquals($expected, $integerOne->divide($integerTwo)->value());
    }

    public function divideProvider()
    {
        return [
            [10,
             2,
             5],
            [0,
             20,
             0],
            [100,
             100,
             1]
        ];
    }


    /**
     * @covers ::divide
     */
    public function testDivideByZero()
    {

        self::setExpectedException(\AGmakonts\STL\Number\Exception\DivisionByZeroException::class);

        $integerOne = \AGmakonts\STL\Number\Integer::get(10);
        $integerTwo = \AGmakonts\STL\Number\Integer::get(0);

        $integerOne->divide($integerTwo)->value();
    }

    /**
     * @dataProvider isZeroProvider
     * @covers ::isZero
     */
    public function testIsZero($first, $expected)
    {
        $integerOne = \AGmakonts\STL\Number\Integer::get($first);

        self::assertEquals($expected, $integerOne->isZero());
    }

    public function isZeroProvider()
    {
        return [
            [10,
             FALSE],
            [-10,
             FALSE],
            [0,
             TRUE]
        ];
    }

    /**
     * @dataProvider gteqProvider
     * @covers ::isGreaterOrEqualTo
     */
    public function testIsGreaterOrEqualTo($integer, $compare, $expected)
    {

        $int       = \AGmakonts\STL\Number\Integer::get($integer);
        $secondInt = \AGmakonts\STL\Number\Integer::get($compare);

        self::assertTrue($expected === $int->isGreaterOrEqualTo($secondInt));
    }

    public function gteqProvider()
    {
        return [
            [11,
             10,
             TRUE],
            [5,
             5,
             TRUE],
            [1,
             340,
             FALSE],
        ];
    }

    /**
     * @dataProvider getProvider
     * @covers ::get
     * T
     */
    public function testGet($value)
    {
        $integer = \AGmakonts\STL\Number\Integer::get($value);

        self::assertInstanceOf(\AGmakonts\STL\Number\Integer::class, $integer);
    }

    /**
     * @dataProvider getProvider
     * @covers ::get
     */
    public function testSameInstance($value)
    {
        $integer = \AGmakonts\STL\Number\Integer::get($value);

        self::assertTrue($integer === \AGmakonts\STL\Number\Integer::get($value));
    }

    public function getProvider()
    {
        return [
            [23],
            [100],
            [0]
        ];
    }

    /**
     * @dataProvider invalidValueProvider
     * @covers ::get
     */
    public function testInvalidValue($value)
    {

        self::setExpectedException(\InvalidArgumentException::class);
        \AGmakonts\STL\Number\Integer::get($value);
    }

    public function invalidValueProvider()
    {
        return [
            ['a'],
            [NULL],
            [new DateTime()]
        ];
    }

    /**
     * @dataProvider isNegativeProvider
     * @covers ::isNegative
     */
    public function testIsNegative($integer, $expected)
    {

        $int = \AGmakonts\STL\Number\Integer::get($integer);

        self::assertTrue($expected === $int->isNegative());
    }

    public function isNegativeProvider()
    {
        return [
            [2,
             FALSE],
            [0,
             FALSE],
            [-3,
             TRUE],
        ];
    }

    /**
     * @dataProvider decrementIncrementDataProvider
     * @covers ::decrement
     */
    public function testDecrement($value)
    {

        $int = \AGmakonts\STL\Number\Integer::get($value);
        $int = $int->decrement();

        self::assertTrue(($value - 1) === $int->value());
    }

    /**
     * @dataProvider decrementIncrementDataProvider
     * @covers ::increment
     */
    public function testIncrement($value)
    {

        $int = \AGmakonts\STL\Number\Integer::get($value);
        $int = $int->increment();

        self::assertTrue(($value + 1) === $int->value());
    }

    public function decrementIncrementDataProvider()
    {
        return [
            [-23],
            [100],
            [0]
        ];
    }
}
