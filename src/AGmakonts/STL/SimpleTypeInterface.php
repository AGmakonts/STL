<?php

namespace AGmakonts\STL;

/**
 *
 * @author Adam
 *
 */
interface SimpleTypeInterface
{
    /**
     * @return mixed
     */
    public function value();

    /**
     * @return string
     */
    public function _toString();

    /**
     * @return SimpleTypeInterface
     */
    static public function get();
}
