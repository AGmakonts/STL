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
        $starter = \AGmakonts\STL\Number\Integer::get($int1);
        $subtract = \AGmakonts\STL\Number\Integer::get($int2);

        self::assertEquals($int3, $starter->subtract($subtract)->value());
    }

    public function subtractProvider()
    {
        return [
            [10 , 2  , 8  ],
            [5  , 5  , 0  ],
            [10 , 20 , -10],
            [5  , 0  , 5  ]
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
            [10, 10, 20],
            [0 , 10, 10],
            [0 , 0 , 0 ],
            [-4, 2 , -2]
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
            [1, 10, 10],
            [2, 10, 20],
            [0, 10, 0 ]
        ];
    }

    /**
     * @dataProvider gteqProvider
     * @covers ::isGreaterOrEqualTo
     */
    public function testIsGreaterOrEqualTo($integer, $compare, $expected)
    {

        $int = \AGmakonts\STL\Number\Integer::get($integer);
        $secondInt = \AGmakonts\STL\Number\Integer::get($compare);

        self::assertTrue($expected === $int->isGreaterOrEqualTo($secondInt));
    }

    public function gteqProvider()
    {
        return [
            [11 , 10 , TRUE  ],
            [5  , 5  , TRUE  ],
            [1  , 340, FALSE ],
        ];
    }

    /**
     * @dataProvider getProvider
     * @covers ::get
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
        $integer = \AGmakonts\STL\Number\Integer::get($value);


    }

    public function invalidValueProvider()
    {
        return [
            ['a'],
            [NULL],
            [new DateTime()]
        ];
    }

}
