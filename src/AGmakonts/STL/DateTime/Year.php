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
    private $year;

    /**
     * @var bool
     */
    private $isLeap;


    /**
     * @param \AGmakonts\STL\Number\Integer $year
     *
     */
    public function __construct(Integer $year = NULL)
    {
        $date = new \DateTime();

        if (NULL === $year) {
            $year = new Integer($date->format('Y'));
        } else {
            $date->setDate($year->value(), 1, 1);
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