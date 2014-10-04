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
    public function length();

    /**
     *
     * @param Integer $start
     * @param Integer $length
     * @return StringInterface
     */
    public function substr(Integer $start, Integer $length = NULL);

    /**
     *
     * @param StringInterface $string
     * @return StringInterface
     */
    public function concat(StringInterface $string);

    /**
     *
     * @param StringInterface $string
     * @return boolean
     */
    public function assertIsEqualTo(StringInterface $string);

    /**
     * @return StringInterface
     */
    public function uppercase();

    /**
     * @return StringInterface
     */
    public function lowercase();

    /**
     *
     * @param Natural $length
     * @param StringInterface $elipsis
     * @return StringInterface
     */
    public function truncate(Natural $length, StringInterface $elipsis = NULL);

    /**
     * @return StringInterface
     */
    public function reverse();

    /**
     *
     * @param Natural $position
     * @return StringInterface
     */
    public function charAtPosition(Natural $position);


}
