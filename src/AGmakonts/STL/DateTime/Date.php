<?php

namespace AGmakonts\STL\DateTime;


use AGmakonts\STL\SimpleTypeInterface;

class Date implements SimpleTypeInterface
{
    private $_year;
    private $_month;
    private $_day;

    /**
     * @return mixed
     */
    public function day()
    {
        return $this->_day;
    }

    /**
     * @return mixed
     */
    public function month()
    {
        return $this->_month;
    }

    /**
     * @return mixed
     */
    public function year()
    {
        return $this->_year;
    }


    /**
     * @return mixed
     */
    public function value()
    {
        // TODO: Implement value() method.
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }


} 