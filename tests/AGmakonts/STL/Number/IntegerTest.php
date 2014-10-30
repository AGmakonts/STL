<?php
/**
 * @coversDefaultClass \AGmakonts\STL\String\String
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
}
