<?php
/**
 * Created by PhpStorm.
 * User: adamgrabek
 * Date: 04/10/14
 * Time: 21:09
 */

namespace AGmakonts\STL\DateTime;


use AGmakonts\STL\Number\Integer;

class Month
{
    const MIN_MONTH = 0;
    const MAX_MONTH = 12;

    const JANUARY   = 1;
    const FEBRUARY  = 2;
    const MARCH     = 3;
    const APRIL     = 4;
    const MAY       = 5;
    const JUNE      = 6;
    const JULY      = 7;
    const AUGUST    = 8;
    const SEPTEMBER = 9;
    const OCTOBER   = 10;
    const NOVEMBER  = 11;
    const DECEMBER  = 12;


    /**
     * @param integer $number
     */
    public function __construct(Integer $month = NULL)
    {
        if(NUll === $month) {
            $date = new \DateTime();
            $number = new Integer($date->format("m"));
        }



        if (TRUE === $month->assertIsGreaterThan(new Integer(self::MAX_MONTH))) {


        }


    }

} 