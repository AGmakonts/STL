<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-10-25
 * Time: 00:58
 */
use AGmakonts\STL\Number\Integer;
use AGmakonts\STL\String\String;

/**
 * @coversDefaultClass \AGmakonts\STL\String\String
 */
class StringTest extends PHPUnit_Framework_TestCase
{


    /**
     * @covers ::get
     * @dataProvider getProvider
     */
    public function testGet($value, $expected)
    {

        $string = String::get($value);

        self::assertEquals($expected,$string->value());



    }





    public function getProvider()
    {
        return [
            ['String', 'String'],
            ['', ''],
            ['              ', ''],
            [String::get('Bla Bla Bla'), 'Bla Bla Bla'],

        ];
    }

    /**
     * @covers ::get
     * @dataProvider invalidGetProvider
     */
    public function testGetWithInvalidValues($value)
    {
        self::setExpectedException(\InvalidArgumentException::class);
        $string = String::get($value);

    }

    public function invalidGetProvider()
    {
        return [
            [32],
            [TRUE],
            [new DateTime()],


        ];
    }

    /**
     * @covers ::get
     */
    public function testSameInstance()
    {
        $stringTest = String::get("Testing string");

        $differentString = String::get("Bla Bla Bla");
        $sameString = String::get("Testing string");

        $spl = new SplObjectStorage();

        $spl->attach($stringTest);

        self::assertFalse($spl->contains($differentString));
        self::assertTrue($spl->contains($sameString));
    }

    /**
     * @covers ::uppercase
     */
    public function testUppercase()
    {
        $string = String::get("uppercase");

        $uppercase = $string->uppercase();

        self::assertEquals('UPPERCASE', $uppercase->value());
    }

    /**
     * @covers ::lowercase
     */
    public function testLowercase()
    {
        $string = String::get("loWerCaSE");

        $lowercase = $string->lowercase();

        self::assertEquals('lowercase', $lowercase->value());
    }

    /**
     * @covers ::reverse
     */
    public function testReverse()
    {
        $string = String::get("qwerty");

        self::assertEquals('ytrewq', $string->reverse()->value());
    }

    /**
     * @covers ::truncate
     */
    public function testTruncateWithoutEllipsis()
    {
        $string = String::get("Long string that needs to be chopped down");

        $shortString = $string->truncate(Integer::get(14));

        self::assertEquals('Long string', $shortString->value());
    }

    /**
     * @covers ::truncate
     */
    public function testTruncateWithEllipsis()
    {
        $string = String::get("Long string that needs to be chopped down");

        $shortString = $string->truncate(Integer::get(16), String::get("..."));

        self::assertEquals('Long string...', $shortString->value());
    }

    /**
     * @covers ::truncate
     */
    public function testTruncateShortString()
    {
        $string1 = String::get("Short String");

        $shortString1 = $string1->truncate(Integer::get(50));

        self::assertEquals('Short String', $shortString1->value(), Integer::get(50)->value());

        $string2 = String::get("Short String but not so much");

        $shortString2 = $string2->truncate(Integer::get(20));

        self::assertEquals('Short String but not', $shortString2->value(), Integer::get(50)->value());


    }

    /**
     * @covers ::truncate
     */
    public function testTruncateShortStringWithEllipsis()
    {
        $string = String::get("Short String");

        $shortString = $string->truncate(Integer::get(50));

        self::assertEquals('Short String', $shortString->value());
    }

    public function testLength()
    {
        $string = String::get("String with 20 chars");

        self::assertEquals(20, $string->length()->value());
    }

    /**
     * @covers ::concat
     */
    public function testConcatWithoutGlue()
    {
        $firstString = String::get("First part");
        $secondString = String::get("second part");

        self::assertEquals('First partsecond part', $firstString->concat($secondString)
                                                                ->value());
    }


    /**
     * @covers ::concat
     */
    public function testConcatWithGlue()
    {
        $firstString = String::get("First part");
        $secondString = String::get("second part");

        $glue = String::get(' - ');

        self::assertEquals('First part - second part', $firstString->concat($secondString, $glue)->value());
    }

    /**
     * @covers ::substr
     */
    public function testSubstr()
    {
        $string = String::get('123456');

        self::assertEquals('1234', $string->substr(Integer::get(), Integer::get(4))->value());
    }

    /**
     * @covers ::charAtPosition
     */
    public function testCharAtPosition()
    {
        $string = String::get('asd');

        self::assertEquals('s', $string->charAtPosition(Integer::get(2))->value());
    }

    /**
     * @covers ::value
     */
    public function testValue()
    {
        $string = String::get('Alpha');

        self::assertEquals('Alpha', $string->value());
    }

    /**
     * @covers ::isEmpty
     */
    public function testAssertIsEmptyForNotEmpty()
    {
        $string = String::get('Not empty');

        self::assertFalse($string->isEmpty());
    }

    /**
     * @covers ::isEmpty
     */
    public function testAssertIsEmptyForEmpty()
    {
        $string = String::get('');

        self::assertFalse($string->isEmpty());
    }

    /**
     * @param $string
     * @param $length
     * @param $fill
     * @param $mode
     * @param $expected
     *
     * @covers ::padded
     * @dataProvider paddedProvider
     */
    public function testPadded($string, $length, $fill, $mode, $expected)
    {
        $string = String::get($string);
        $length = Integer::get($length);

        if(NULL !== $fill) {
            $fill = String::get($fill);
        }

        $mode = \AGmakonts\STL\String\Padding::get($mode);

        self::assertEquals($expected, $string->padded($length, $mode, $fill)->value());

    }

    public function paddedProvider()
    {
        return [
            ['string', 10, '.',   \AGmakonts\STL\String\Padding::LEFT, '....string'],
            ['string', 10, 'ok',  \AGmakonts\STL\String\Padding::LEFT, 'okokstring'],
            ['string', 10, 'qwe', \AGmakonts\STL\String\Padding::LEFT, 'qweqstring']
        ];

    }



}