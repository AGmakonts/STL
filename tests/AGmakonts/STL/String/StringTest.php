<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-10-25
 * Time: 00:58
 */
use AGmakonts\STL\Number\Integer;
use AGmakonts\STL\String\Text;

/**
 * @coversDefaultClass \AGmakonts\STL\String\Text
 */
class StringTest extends PHPUnit_Framework_TestCase
{


    /**
     * @covers ::get
     * @dataProvider getProvider
     */
    public function testGet($value, $expected)
    {

        $string = Text::get($value);

        self::assertEquals($expected,$string->value());



    }





    public function getProvider()
    {
        return [
            ['String', 'String'],
            ['', ''],
            ['              ', ''],
            [Text::get('Bla Bla Bla'), 'Bla Bla Bla'],

        ];
    }

    /**
     * @covers ::get
     * @dataProvider invalidGetProvider
     */
    public function testGetWithInvalidValues($value)
    {
        self::setExpectedException(\InvalidArgumentException::class);
        $string = Text::get($value);

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
        $stringTest = Text::get("Testing string");

        $differentString = Text::get("Bla Bla Bla");
        $sameString = Text::get("Testing string");

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
        $string = Text::get("uppercase");

        $uppercase = $string->uppercase();

        self::assertEquals('UPPERCASE', $uppercase->value());
    }

    /**
     * @covers ::lowercase
     */
    public function testLowercase()
    {
        $string = Text::get("loWerCaSE");

        $lowercase = $string->lowercase();

        self::assertEquals('lowercase', $lowercase->value());
    }

    /**
     * @covers ::reverse
     */
    public function testReverse()
    {
        $string = Text::get("qwerty");

        self::assertEquals('ytrewq', $string->reverse()->value());
    }

    /**
     * @covers ::truncate
     */
    public function testTruncateWithoutEllipsis()
    {
        $string = Text::get("Long string that needs to be chopped down");

        $shortString = $string->truncate(Integer::get(14));

        self::assertEquals('Long string', $shortString->value());
    }

    /**
     * @covers ::truncate
     */
    public function testTruncateWithEllipsis()
    {
        $string = Text::get("Long string that needs to be chopped down");

        $shortString = $string->truncate(Integer::get(16), Text::get("..."));

        self::assertEquals('Long string...', $shortString->value());
    }

    /**
     * @covers ::truncate
     */
    public function testTruncateShortString()
    {
        $string1 = Text::get("Short String");

        $shortString1 = $string1->truncate(Integer::get(50));

        self::assertEquals('Short String', $shortString1->value(), Integer::get(50)->value());

        $string2 = Text::get("Short String but not so much");

        $shortString2 = $string2->truncate(Integer::get(20));

        self::assertEquals('Short String but not', $shortString2->value(), Integer::get(50)->value());


    }

    /**
     * @covers ::truncate
     */
    public function testTruncateShortStringWithEllipsis()
    {
        $string = Text::get("Short String");

        $shortString = $string->truncate(Integer::get(50));

        self::assertEquals('Short String', $shortString->value());
    }

    public function testLength()
    {
        $string = Text::get("String with 20 chars");

        self::assertEquals(20, $string->length()->value());
    }

    /**
     * @covers ::concat
     */
    public function testConcatWithoutGlue()
    {
        $firstString = Text::get("First part");
        $secondString = Text::get("second part");

        self::assertEquals('First partsecond part', $firstString->concat($secondString)
                                                                ->value());
    }


    /**
     * @covers ::concat
     */
    public function testConcatWithGlue()
    {
        $firstString = Text::get("First part");
        $secondString = Text::get("second part");

        $glue = Text::get(' - ');

        self::assertEquals('First part - second part', $firstString->concat($secondString, $glue)->value());
    }

    /**
     * @covers ::substr
     */
    public function testSubstr()
    {
        $string = Text::get('123456');

        self::assertEquals('1234', $string->substr(Integer::get(), Integer::get(4))->value());
    }

    /**
     * @covers ::charAtPosition
     */
    public function testCharAtPosition()
    {
        $string = Text::get('asd');

        self::assertEquals('s', $string->charAtPosition(Integer::get(2))->value());
    }

    /**
     * @covers ::value
     */
    public function testValue()
    {
        $string = Text::get('Alpha');

        self::assertEquals('Alpha', $string->value());
    }

    /**
     * @covers ::isEmpty
     */
    public function testAssertIsEmptyForNotEmpty()
    {
        $string = Text::get('Not empty');

        self::assertFalse($string->isEmpty());
    }

    /**
     * @covers ::isEmpty
     */
    public function testAssertIsEmptyForEmpty()
    {
        $string = Text::get('');

        self::assertTrue($string->isEmpty());

        $string = Text::get();

        self::assertTrue($string->isEmpty());
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
        $string = Text::get($string);
        $length = Integer::get($length);

        if(NULL !== $fill) {
            $fill = Text::get($fill);
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