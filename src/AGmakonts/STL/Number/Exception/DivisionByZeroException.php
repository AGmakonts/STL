<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 31.10.14
 * Time: 17:34
 */

namespace AGmakonts\STL\Number\Exception;


class DivisionByZeroException extends \BadMethodCallException
{
    public function __construct()
    {
        $this->message = 'Division by zero!';
    }
}