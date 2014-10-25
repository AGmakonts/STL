<?php

namespace AGmakonts\STL\DateTime;


use AGmakonts\STL\SimpleTypeInterface;

class Date implements SimpleTypeInterface
{
    private $year;
    private $month;
    private $day;

    static public function get()
    {
        // TODO: Implement get() method.
    }


    /**
     * @return mixed
     */
    public function day()
    {
        return $this->day;
    }

    /**
     * @return mixed
     */
    public function month()
    {
        return $this->month;
    }

    /**
     * @return mixed
     */
    public function year()
    {
        return $this->year;
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
    public function _toString()
    {
        // TODO: Implement __toString() method.
    }


} 