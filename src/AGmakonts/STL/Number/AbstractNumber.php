<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-10-28
 * Time: 23:00
 */

namespace AGmakonts\STL\Number;


use AGmakonts\STL\AbstractValueObject;

abstract class AbstractNumber extends AbstractValueObject
{
    protected $value;


    /**
     * @return string
     */
    public function extractedValue()
    {
        return self::extractValue($this->value());
    }

    /**
     * @return int
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function _toString()
    {
        $this->value();
    }



} 