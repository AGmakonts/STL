<?php
/**
 * Created by PhpStorm.
 * User: adamgrabek
 * Date: 01/11/14
 * Time: 20:23
 */

namespace AGmakonts\STL\Structure\Exception;


class InvalidElementException extends \Exception
{
    public function __construct()
    {
        $this->message = 'One of the elements is of invalid type';
    }
}