<?php

/**
 * Created by IntelliJ IDEA.
 * User: radek
 * Date: 13.01.15
 * Time: 16:34
 */
class EnumTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers ::value
     */
    public function testValue()
    {
        require_once("EnumMock.php");
        $enumMock = EnumMock::get(EnumMock::FIRST_CONST);
        $this->assertEquals(EnumMock::FIRST_CONST, $enumMock->value());
    }


    /**
     * @covers ::extractedValue
     */
    public function testExtractedValue()
    {
        require_once("EnumMock.php");
        $enumMock = EnumMock::get(EnumMock::FIRST_CONST);
        $this->assertTrue(is_string($enumMock->extractedValue()));
    }
}
