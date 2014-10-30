<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-10-25
 * Time: 00:58
 */
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
        self::setExpectedException(AGmakonts\STL\String\Exception\InvalidStringValueException::class);


        self::assertEquals($expected,\AGmakonts\STL\String\String::get($value)->value());

    }

    public function getProvider()
    {
        return [
            ['String', 'String'],
            ['', ''],
            ['              ', ''],
            [\AGmakonts\STL\String\String::get('Bla Bla Bla'), 'Bla Bla Bla'],
            [\AGmakonts\STL\Number\Integer::get(25), 25],

        ];
    }

    /**
     * @covers ::get
     */
    public function testSameInstance()
    {
        $stringTest = \AGmakonts\STL\String\String::get("Testing string");

        $differentString = \AGmakonts\STL\String\String::get("Bla Bla Bla");
        $sameString = \AGmakonts\STL\String\String::get("Testing string");

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
        $string = \AGmakonts\STL\String\String::get("uppercase");

        $uppercase = $string->uppercase();

        self::assertEquals('UPPERCASE', $uppercase->value());
    }

    /**
     * @covers ::lowercase
     */
    public function testLowercase()
    {
        $string = \AGmakonts\STL\String\String::get("loWerCaSE");

        $lowercase = $string->lowercase();

        self::assertEquals('lowercase', $lowercase->value());
    }

    /**
     * @covers ::reverse
     */
    public function testReverse()
    {
        $string = \AGmakonts\STL\String\String::get("qwerty");

        self::assertEquals('ytrewq', $string->reverse()->value());
    }

    /**
     * @covers ::truncate
     */
    public function testTruncateWithoutEllipsis()
    {
        $string = \AGmakonts\STL\String\String::get("Long string that needs to be chopped down");

        $shortString = $string->truncate(\AGmakonts\STL\Number\Integer::get(14));

        self::assertEquals('Long string', $shortString->value());
    }

    /**
     * @covers ::truncate
     */
    public function testTruncateWithEllipsis()
    {
        $string = \AGmakonts\STL\String\String::get("Long string that needs to be chopped down");

        $shortString = $string->truncate(\AGmakonts\STL\Number\Integer::get(16), \AGmakonts\STL\String\String::get("..."));

        self::assertEquals('Long string...', $shortString->value());
    }

    /**
     * @covers ::truncate
     */
    public function testTruncateShortString()
    {
        $string1 = \AGmakonts\STL\String\String::get("Short String");

        $shortString1 = $string1->truncate(\AGmakonts\STL\Number\Integer::get(50));

        self::assertEquals('Short String', $shortString1->value(), \AGmakonts\STL\Number\Integer::get(50)->value());

        $string2 = \AGmakonts\STL\String\String::get("Short String but not so much");

        $shortString2 = $string2->truncate(\AGmakonts\STL\Number\Integer::get(20));

        self::assertEquals('Short String but not', $shortString2->value(), \AGmakonts\STL\Number\Integer::get(50)->value());


    }

    /**
     * @covers ::truncate
     */
    public function testTruncateShortStringWithEllipsis()
    {
        $string = \AGmakonts\STL\String\String::get("Short String");

        $shortString = $string->truncate(\AGmakonts\STL\Number\Integer::get(50));

        self::assertEquals('Short String', $shortString->value());
    }

    public function testLength()
    {
        $string = \AGmakonts\STL\String\String::get("String with 20 chars");

        self::assertEquals(20, $string->length()->value());
    }

    /**
     * @covers ::concat
     */
    public function testConcatWithoutGlue()
    {
        $firstString = \AGmakonts\STL\String\String::get("First part");
        $secondString = \AGmakonts\STL\String\String::get("second part");

        self::assertEquals('First partsecond part', $firstString->concat($secondString)
                                                                ->value());
    }


    /**
     * @covers ::concat
     */
    public function testConcatWithGlue()
    {
        $firstString = \AGmakonts\STL\String\String::get("First part");
        $secondString = \AGmakonts\STL\String\String::get("second part");

        $glue = \AGmakonts\STL\String\String::get(' - ');

        self::assertEquals('First part - second part', $firstString->concat($secondString, $glue)->value());
    }

    /**
     * @covers ::substr
     */
    public function testSubstr()
    {
        $string = \AGmakonts\STL\String\String::get('123456');

        self::assertEquals('1234', $string->substr(\AGmakonts\STL\Number\Integer::get(),\AGmakonts\STL\Number\Integer::get(4))->value());
    }

    /**
     * @covers ::charAtPosition
     */
    public function testCharAtPosition()
    {
        $string = \AGmakonts\STL\String\String::get('asd');

        self::assertEquals('s', $string->charAtPosition(\AGmakonts\STL\Number\Integer::get(2))->value());
    }

    /**
     * @covers ::value
     */
    public function testValue()
    {
        $string = \AGmakonts\STL\String\String::get('Alpha');

        self::assertEquals('Alpha', $string->value());
    }

    /**
     * @covers ::isEmpty
     */
    public function testAssertIsEmptyForNotEmpty()
    {
        $string = \AGmakonts\STL\String\String::get('Not empty');

        self::assertFalse($string->isEmpty());
    }

    /**
     * @covers ::isEmpty
     */
    public function testAssertIsEmptyForEmpty()
    {
        $string = \AGmakonts\STL\String\String::get('');

        self::assertFalse($string->isEmpty());
    }



}