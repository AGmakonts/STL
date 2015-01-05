<?php
namespace AGmakonts\STL\String;

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
     * @param \AGmakonts\STL\Number\Integer         $length
     * @param \AGmakonts\STL\String\StringInterface $ellipsis
     *
     * @return \AGmakonts\STL\String\StringInterface
     */
    public function truncate(Integer $length, StringInterface $ellipsis = NULL);

    /**
     * @return StringInterface
     */
    public function reverse();

    /**
     *
     * @param \AGmakonts\STL\Number\Integer $position
     * @return \AGmakonts\STL\String\StringInterface
     */
    public function charAtPosition(Integer $position);

    /**
     * @param \AGmakonts\STL\Number\Integer              $length
     * @param null|\AGmakonts\STL\String\Padding         $mode
     * @param null|\AGmakonts\STL\String\StringInterface $fill
     *
     * @return \AGmakonts\STL\String\StringInterface
     */
    public function padded(Integer $length, Padding $mode = NULL, StringInterface $fill = NULL);

    /**
     * @param $string
     * @return \AGmakonts\STL\String\StringInterface
     */
    static public function get($string);
}