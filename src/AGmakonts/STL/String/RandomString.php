<?php
/**
 * Created by IntelliJ IDEA.
 * User: Radek Adamiec <radek@procreative.eu>
 * Date: 20.01.15
 * Time: 11:19
 */

namespace AGmakonts\STL\String;


use AGmakonts\STL\Number\Integer;
use AGmakonts\STL\String\Exception\InvalidStringLengthException;

class RandomString
{


    /**
     * This is for ensuring that this class will be used as fabric
     */
    private function __construct()
    {

    }

    /**
     * @param \AGmakonts\STL\Number\Integer $stringLength
     *
     * @return \AGmakonts\STL\String\Text
     */
    static public function generate(Integer $stringLength)
    {
        if ($stringLength->isZero() === TRUE || $stringLength->isNegative() === TRUE) {
            throw new InvalidStringLengthException("String length must be grater than zero");
        }

        $randString = bin2hex(openssl_random_pseudo_bytes(ceil($stringLength->value() / 2)));
        if ($stringLength->value() % 2 !== 0) {
            $randString = substr($randString, 0, -1);
        }

        return Text::get($randString);
    }


}