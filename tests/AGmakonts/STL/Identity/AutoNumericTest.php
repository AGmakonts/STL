<?php
/**
 * Created by PhpStorm.
 * User: adamgrabek
 * Date: 10/11/14
 * Time: 19:53
 */
use AGmakonts\STL\Identity\AutoNumeric;


/**
 * @coversDefaultClass \AGmakonts\STL\Identity\AutoNumeric
 */
class AutoNumericTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     */
    public function test__construct()
    {
        $identity = AutoNumeric::generate();

        $identityReflection = new ReflectionClass(AutoNumeric::class);

        $identityProperty = $identityReflection->getProperty('identity');
        $identityProperty->setAccessible(TRUE);

        self::assertInstanceOf(\AGmakonts\STL\String\Text::class, $identityProperty->getValue($identity));
    }

    /**
     * @covers ::generate
     */
    public function testGenerate()
    {
        $identity = AutoNumeric::generate();

        self::assertInstanceOf(AutoNumeric::class, $identity);


    }
}
 