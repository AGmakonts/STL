<?php

/**
 * Created by PhpStorm.
 * User: miszka
 * Date: 20.07.15
 * Time: 14:13
 */

/**
 * @coversDefaultClass \AGmakonts\STL\Structure\Json
 */
class JsonTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers::__construct()
     * @covers::isJsonValid()
     */
    public function testInvalidJsonException(){

        $this->setExpectedException(\AGmakonts\STL\Structure\Exception\InvalidJsonException::class);
        $json = \AGmakonts\STL\Structure\Json::get('ss');
    }

    /**
     * @covers::value()
     */
    public function testValue(){


        $json = \AGmakonts\STL\Structure\Json::get('{"timestamp": 1385150462,
  "stuff": {
    "this": 2,
    "that": 4,
    "other": 1}}');
        $this->assertSame('{"timestamp": 1385150462,
  "stuff": {
    "this": 2,
    "that": 4,
    "other": 1}}',$json->value());


    }




}
