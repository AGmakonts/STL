<?php
namespace AGmakonts\STL\Number;
use MabeEnum\Enum;

/**
 *
 * @author adamgrabek
 *
 */
class RoundingMode extends Enum
{
    const HALF_UP   = PHP_ROUND_HALF_UP;
    const HALF_DOWN = PHP_ROUND_HALF_DOWN;
    const HALF_EVEN = PHP_ROUND_HALF_EVEN;
    const HALF_ODD  = PHP_ROUND_HALF_ODD;

}
