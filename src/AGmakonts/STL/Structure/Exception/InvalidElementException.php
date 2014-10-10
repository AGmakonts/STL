<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 10.10.14
 * Time: 14:54
 */

namespace AGmakonts\STL\Structure\Exception;


use AGmakonts\STL\String\String;

class InvalidElementException extends \InvalidArgumentException
{
    function __construct($element, String $desired)
    {
        $this->message = sprintf("Element of type '%s' is invalid, only elements of '%s' are accepted", get_class($element), $desired->value());
    }
}