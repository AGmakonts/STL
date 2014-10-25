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
     * @return mixed
     */
    public function _toString();
    static public function get();
}
