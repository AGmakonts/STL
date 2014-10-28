<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-10-28
 * Time: 23:29
 */

namespace AGmakonts\STL\Number;


use AGmakonts\STL\ValueObjectInterface;

interface NumberInterface extends ValueObjectInterface
{
    /**
     * @param $number
     * @return NumberInterface
     */
    static public function get($number);



} 