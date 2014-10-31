<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 29.10.14
 * Time: 10:33
 */

namespace AGmakonts\STL\Number\Exception;

/**
 * Class OutOfRangeException
 *
 * @package AGmakonts\STL\Number\Exception
 */
class OutOfRangeException extends \RangeException
{
    /**
     * @param string $value
     * @param int    $maxValue
     * @param int   $minValue
     */
    public function __construct($value, $maxValue, $minValue)
    {
        $message = 'Value "%d" is out of range. Value needs to be > %s and < %s!';

        $this->message = sprintf($message, $value, $maxValue, $minValue);
    }
}