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
    public function __toString();
}
