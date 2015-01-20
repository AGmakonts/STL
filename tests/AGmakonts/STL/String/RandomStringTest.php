<?php
/**
 * Created by IntelliJ IDEA.
 * User: Radek Adamiec <radek@procreative.eu>
 * Date: 20.01.15
 * Time: 11:40
 */

namespace AGmakonts\STL\String;
use AGmakonts\STL\String\Exception\InvalidStringLengthException;
use AGmakonts\STL\String\RandomString;
use AGmakonts\STL\Number\Integer;


/**
 * Class RandomStringTest
 *
 * @coversDefaultClass \AGmakonts\STL\String\RandomString
 * @package   AGmakonts\STL\String
 * @author    Radek Adamiec <radek@procreative.eu>
 * @copyright 1985 - 2015 Kelleher, Helmrich and Associates, Inc.
 */
class RandomStringTest extends \PHPUnit_Framework_TestCase {


    /**
     * @covers ::generate()
     */
    public function testGenerateUnsignedValue()
    {
        $this->setExpectedException(InvalidStringLengthException::class);
        $randomString = RandomString::generate(Integer::get(-1));
    }


    /**
     * @covers ::generate()
     */
    public function testGenerateZeroValue()
    {
        $this->setExpectedException(InvalidStringLengthException::class);
        $randomString = RandomString::generate(Integer::get(0));
    }


    /**
     * @covers ::generate()
     */
    public function testGenerateProperValue()
    {

        $randomString5 = RandomString::generate(Integer::get(5));
        $this->assertEquals(5, strlen($randomString5->value()));


        $randomString5 = RandomString::generate(Integer::get(900));
        $this->assertEquals(900, strlen($randomString5->value()));
    }
}
