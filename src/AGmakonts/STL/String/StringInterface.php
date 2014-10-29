<?php
namespace AGmakonts\STL\String;

use AGmakonts\STL\Number\Natural;
use AGmakonts\STL\ValueObjectInterface;
use AGmakonts\STL\Number\Integer;
/**
 *
 * @author adamgrabek
 *
 */
interface StringInterface extends ValueObjectInterface
{
    /**
     * @return \AGmakonts\STL\Number\Integer
     */
    public function length();

    /**
     *
     * @param \AGmakonts\STL\Number\Integer $start
     * @param null|\AGmakonts\STL\Number\Integer $length
     *
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
    public function equalTo(StringInterface $string);

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
     * @param \AGmakonts\STL\Number\Integer $length
     * @param StringInterface $ellipsis
     *
     * @return StringInterface
     */
    public function truncate(Integer $length, StringInterface $ellipsis = NULL);

    /**
     * @return StringInterface
     */
    public function reverse();

    /**
     *
     * @param \AGmakonts\STL\Number\Integer $position
     * @return StringInterface
     */
    public function charAtPosition(Integer $position);

    public function padded(Integer $length, Padding $mode = NULL, StringInterface $fill);

    public function converted();

    /**
     * @param $string
     * @return StringInterface
     */
    static public function get($string);


}
