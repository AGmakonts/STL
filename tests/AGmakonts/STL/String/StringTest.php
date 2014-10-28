<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-10-25
 * Time: 00:58
 */

class StringTest extends PHPUnit_Framework_TestCase
{



    public function testGet()
    {
        $stringTest = \AGmakonts\STL\String\String::get("Testing string");

        $differentString = \AGmakonts\STL\String\String::get("Bla Bla Bla");
        $sameString = \AGmakonts\STL\String\String::get("Testing string");

        $spl = new SplObjectStorage();

        $spl->attach($stringTest);

        self::assertFalse($spl->contains($differentString));
        self::assertTrue($spl->contains($sameString));


    }

    public function testUppercase()
    {
        $string = \AGmakonts\STL\String\String::get("uppercase");

        $uppercase = $string->uppercase();

        self::assertEquals('UPPERCASE', $uppercase->value());
    }

    public function testLowercase()
    {
        $string = \AGmakonts\STL\String\String::get("loWerCaSE");

        $lowercase = $string->lowercase();

        self::assertEquals('lowercase', $lowercase->value());
    }

    public function testReverse()
    {
        $string = \AGmakonts\STL\String\String::get("qwerty");

        self::assertEquals('ytrewq', $string->reverse()->value());
    }

    /**
     * @covers \AGmakonts\STL\String\String::truncate
     */
    public function testTruncateWithoutEllipsis()
    {
        $string = \AGmakonts\STL\String\String::get("Long string that needs to be chopped down");

        $shortString = $string->truncate(new \AGmakonts\STL\Number\Natural(14));

        self::assertEquals('Long string', $shortString->value());
    }

    /**
     * @covers \AGmakonts\STL\String\String::truncate
     */
    public function testTruncateWithEllipsis()
    {
        $string = \AGmakonts\STL\String\String::get("Long string that needs to be chopped down");

        $shortString = $string->truncate(new \AGmakonts\STL\Number\Natural(16), \AGmakonts\STL\String\String::get("..."));

        self::assertEquals('Long string...', $shortString->value());
    }

    /**
     * @covers \AGmakonts\STL\String\String::truncate
     */
    public function testTruncateShortString()
    {
        $string = \AGmakonts\STL\String\String::get("Short String");

        $shortString = $string->truncate(new \AGmakonts\STL\Number\Natural(50));

        self::assertEquals('Short String', $shortString->value());
    }

    /**
     * @covers \AGmakonts\STL\String\String::truncate
     */
    public function testTruncateShortStringWithEllipsis()
    {
        $string = \AGmakonts\STL\String\String::get("Short String");

        $shortString = $string->truncate(new \AGmakonts\STL\Number\Natural(50), \AGmakonts\STL\String\String::get("..."));

        self::assertEquals('Short String', $shortString->value());
    }

    public function testLength()
    {
        $string = \AGmakonts\STL\String\String::get("String with 20 chars");

        self::assertEquals(20, $string->length()->value());
    }

}
 