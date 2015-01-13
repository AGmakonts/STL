<?php

/**
 * Created by IntelliJ IDEA.
 * User: Radek Adamiec<radek@procreative.eu>
 * Date: 13.01.15
 * Time: 16:34
 */

/**
 * @coversDefaultClass \AGmakonts\STL\Structure\AbstractEnum
 */
class EnumTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        require_once("EnumMock.php");
    }


    /**
     * @covers ::value
     */
    public function testValue()
    {
        $enumMock = EnumMock::get(EnumMock::FIRST_CONST);
        $this->assertEquals(EnumMock::FIRST_CONST, $enumMock->value());
        $this->assertTrue(is_string($enumMock->value()));

    }
    
    
    public function test__toString(){
        $enumMock = EnumMock::get(EnumMock::FIRST_CONST);
        $this->assertTrue(is_string($enumMock->extractedValue()));
        $this->assertEquals((string) EnumMock::FIRST_CONST, $enumMock->__toString());

    }


    /**
     * @covers ::extractedValue
     */
    public function testExtractedValue()
    {
        $enumMock = EnumMock::get(EnumMock::FIRST_CONST);
        $this->assertTrue(is_string($enumMock->extractedValue()));
    }
}
