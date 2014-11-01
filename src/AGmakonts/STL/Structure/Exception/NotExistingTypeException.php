<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-11-01
 * Time: 01:10
 */

namespace AGmakonts\STL\Structure\Exception;


class NotExistingTypeException extends \Exception
{
    public function __construct($type)
    {
        $this->message = sprintf('Type "%s" does not exist!', $type);
    }
}