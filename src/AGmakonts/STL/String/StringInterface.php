<?php
namespace AGmakonts\STL\String;

use AGmakonts\STL\Number\Natural;
use AGmakonts\STL\SimpleTypeInterface;
/**
 *
 * @author adamgrabek
 *
 */
interface StringInterface extends SimpleTypeInterface
{
    public function getLength();
    public function substr($start, $length);
    public function concat(StringInterface $string);
    public function simpleFormat(StringInterface $string);
    public function compareTo(StringInterface $string);
    public function uppercase();
    public function lowercase();
    public function truncate(Natural $length, StringInterface $elipsis = NULL);
    public function reverse();
}
