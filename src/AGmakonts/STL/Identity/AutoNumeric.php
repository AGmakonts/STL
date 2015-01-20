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

/**
 * Class AutoNumeric
 *
 * @package AGmakonts\STL\Identity
 */
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

    /**
     * @param \AGmakonts\STL\String\String $identity
     * @return \AGmakonts\STL\Identity\AutoNumeric
     */
    public static function get(String $identity)
    {
        return self::getInstanceForValue($identity);
    }

    /**
     * @return \AGmakonts\STL\Identity\AutoNumeric
     */
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
        return self::extractValue([$this->identity()]);
    }

    /**
     * @return mixed
     */
    public function identity()
    {
        return $this->identity;
    }

    /**
     * @return string
     */
    public function value()
    {
        return $this->identity()->value();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

} 