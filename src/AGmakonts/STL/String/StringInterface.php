<?php
namespace AGmakonts\STL\String;

use AGmakonts\STL\Number\Natural;
use AGmakonts\STL\SimpleTypeInterface;
use AGmakonts\STL\Number\Integer;
/**
 *
 * @author adamgrabek
 *
 */
interface StringInterface extends SimpleTypeInterface
{
	/**
	 * @return Natural
	 */
    public function getLength();
    public function substr(Integer $start, Integer $length = NULL);
    public function concat(StringInterface $string);
    public function simpleFormat(StringInterface $string);
    public function compareTo(StringInterface $string);
    public function uppercase();
    public function lowercase();
    public function truncate(Natural $length, StringInterface $elipsis = NULL);
    public function reverse();
    public function getCharAtPosition(Natural $position);

}
