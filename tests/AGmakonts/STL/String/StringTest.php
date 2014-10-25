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
}
 