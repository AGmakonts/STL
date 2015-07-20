<?php
/**
 * Created by PhpStorm.
 * User: miszka
 * Date: 20.07.15
 * Time: 14:00
 */

namespace AGmakonts\STL\Structure\Exception;



class InvalidJsonException extends \InvalidArgumentException
{
    public function __construct()
    {
        $this->message = 'Invalid Json ';
    }
}