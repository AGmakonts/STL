<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 29.10.14
 * Time: 11:09
 */

namespace AGmakonts\STL\Number;


use MabeEnum\Enum;

class RoundingMode extends Enum
{
    const HALF_UP   = 0;
    const HALF_DOWN = 1;
    const UP        = 2;
    const DOWN      = 3;
}