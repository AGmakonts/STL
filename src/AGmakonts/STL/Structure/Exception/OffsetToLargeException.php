<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-11-01
 * Time: 19:28
 */

namespace AGmakonts\STL\Structure\Exception;


use Exception;

class OffsetToLargeException extends \Exception
{
    public function __construct($allowed, $requested)
    {
        $this->message = sprintf('Structure size (%s) is smaller than requested (%s)', $allowed, $requested);
    }
}