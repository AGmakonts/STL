<?php
/**
 * @coversDefaultClass \AGmakonts\STL\String\String
 * @runTestsInSeparateProcesses
 */
class IntegerTest extends PHPUnit_Framework_TestCase
{


    /**
     * @dataProvider subtractProvider
     * @expectedException PHPUnit_Framework_Error
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
}
 