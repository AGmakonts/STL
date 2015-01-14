<?php
/**
 * Created by PhpStorm.
 * User: adamgrabek
 * Date: 08/11/14
 * Time: 01:47
 */

namespace AGmakonts\STL\Identity;


use AGmakonts\STL\AbstractValueObject;
use AGmakonts\STL\String\String;

class AutoNumeric extends AbstractValueObject implements IdentityInterface
{
    private $identity;

    /**
     * @param array $value
     *
     */
    protected function __construct(array $value)
    {
        $this->identity = $value[0];
    }
    public static function get(String $identity)
    {
        return self::getInstanceForValue($identity);
    }

    public static function generate()
    {
        $server = hexdec(basename(__FILE__)) ^ hexdec(gethostname()) % 99;
        $pid    = str_pad(substr(getmypid(), -2), 2, '0', STR_PAD_LEFT);
        $time   = substr(str_pad(str_replace('.', '', microtime(TRUE)), 14, '0'), 2);

        return self::get(String::get($time . str_pad($server . $pid . mt_rand(0, 9), 5, '0', STR_PAD_LEFT)));
    }


    /**
     * @return string
     */
    public function extractedValue()
    {
        // TODO: Implement extractedValue() method.
    }

    public function identity()
    {
        // TODO: Implement identity() method.
    }

    /**
     * @return mixed
     */
    public function value()
    {
        // TODO: Implement value() method.
    }

    /**
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

} 