<?php

namespace AGmakonts\STL;

/**
 *
 * @author Adam
 *
 */
interface ValueObjectInterface
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
     * @return ValueObjectInterface
     */
    static public function get();
}
