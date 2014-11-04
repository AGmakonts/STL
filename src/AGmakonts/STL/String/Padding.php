<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 28.10.14
 * Time: 19:44
 */

namespace AGmakonts\STL\String;


use MabeEnum\Enum;

class Padding extends Enum
{
    const LEFT   = STR_PAD_LEFT;
    const RIGHT  = STR_PAD_RIGHT;
    const CENTER = STR_PAD_BOTH;
}