<?php
/**
 * Created by PhpStorm.
 * User: adamgrabek
 * Date: 04/10/14
 * Time: 17:49
 */

namespace AGmakonts\STL\DateTime;


use AGmakonts\STL\Number\Integer;
use AGmakonts\STL\SimpleTypeInterface;

class Year implements SimpleTypeInterface
{
    /**
     * @var \AGmakonts\STL\Number\Integer
     */
    private $_year;

    /**
     * @var bool
     */
    private $_isLeap;


    /**
     * @param \AGmakonts\STL\Number\Integer $year
     *
     */
    public function __construct(Integer $year = NULL)
    {
        if (NULL === $year) {
            $date = new \DateTime();
            $year = new Integer($date->format('Y'));
        }

        $this->_isLeap = boolval($date->format('L'));
        $this->_year = $year;

    }

    /**
     * @return \AGmakonts\STL\Number\Integer
     */
    public function value()
    {
        return $this->_year;
    }

    /**
     * @return integer
     */
    public function __toString()
    {
        return $this->value()->value();
    }


} 