<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-11-01
 * Time: 19:18
 */

namespace AGmakonts\STL\Structure\Exception;


class InvalidElementContainerException extends \InvalidArgumentException
{
    public function __construct()
    {
        $this->message = 'Provided elements list is not an array or iterator';
    }
}