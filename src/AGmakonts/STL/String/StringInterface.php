<?php
namespace AGmakonts\STL\String;

use AGmakonts\STL\Number\Natural;
/**
 *
 * @author adamgrabek
 *
 */
interface StringInterface
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
