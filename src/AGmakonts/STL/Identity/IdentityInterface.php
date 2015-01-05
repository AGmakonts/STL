<?php
/**
 * Created by PhpStorm.
 * User: adamgrabek
 * Date: 08/11/14
 * Time: 01:45
 */

namespace AGmakonts\STL\Identity;


use AGmakonts\STL\ValueObjectInterface;

interface IdentityInterface extends ValueObjectInterface
{
    public function identity();


    public static function generate();
} 