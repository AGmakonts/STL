<?php
/**
 * Created by IntelliJ IDEA.
 * User: Radek Adamiec<radek@procreative.eu>
 * Date: 13.01.15
 * Time: 17:58
 */
use \AGmakonts\STL\Number\Integer;


/**
 * @coversDefaultClass \AGmakonts\STL\DateTime\DateTime
 */
class DateTimeTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers ::__construct
     */
    public function test__construct()
    {
        $testClass1 = \AGmakonts\STL\DateTime\DateTime::get(Integer::get(1));
        $testClass2 = \AGmakonts\STL\DateTime\DateTime::get();

        $this->assertInstanceOf(\AGmakonts\STL\DateTime\DateTime::class, $testClass1);
        $this->assertInstanceOf(\AGmakonts\STL\DateTime\DateTime::class, $testClass2);
    }

    /**
     * @covers ::value()
     * @return string
     */
    public function testValue()
    {
        $testClass = \AGmakonts\STL\DateTime\DateTime::get(Integer::get(1));
        $this->assertEquals((new DateTime())->setTimestamp(1)
                                            ->format(\AGmakonts\STL\DateTime\DateTime::DATETIME_FORMAT),
                            $testClass->value());
    }

    /**
     * @covers ::__toString()
     * @return string
     */
    public function test__toString()
    {
        $testClass = \AGmakonts\STL\DateTime\DateTime::get(Integer::get(1));
        $this->assertEquals((new DateTime())->setTimestamp(1)
                                            ->format(\AGmakonts\STL\DateTime\DateTime::DATETIME_FORMAT),
                            $testClass->value());
        $this->assertTrue(is_string($testClass->value()));
    }

    /**
     * @covers ::extractedValue
     * @return string
     */
    public function testExtractedValue()
    {
        $testClass = \AGmakonts\STL\DateTime\DateTime::get(Integer::get(1));
        $this->assertTrue(is_string($testClass->extractedValue()));
    }


    /**
     * @covers ::get
     * @return mixed
     */
    public function testGet()
    {
        $testClass1 = \AGmakonts\STL\DateTime\DateTime::get(Integer::get(1));
        $this->assertInstanceOf(\AGmakonts\STL\DateTime\DateTime::class, $testClass1);
    }
}
