<?php
/**
 * Created by PhpStorm.
 * User: adamgrabek
 * Date: 04/10/14
 * Time: 17:49
 */

namespace AGmakonts\STL\DateTime;


use AGmakonts\STL\Number\Integer;

class Year extends Integer
{
    private $_isLeap;


    /**
     * @param integer $number
     */
    public function __construct($number = NULL)
    {
        if(NULL === $number) {
            $date = new \DateTime();
            $number = $date->format('m');
        }

        

        parent::__construct($number);
    }


} 