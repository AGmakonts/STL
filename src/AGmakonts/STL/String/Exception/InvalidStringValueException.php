<?php

namespace AGmakonts\STL\String\Exception;

/**
 *
 * @author Adamm
 *
 */
class InvalidStringValueException extends \InvalidArgumentException
{
    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $message = "Value '%s' is not valid string";

        if(TRUE === is_object($value)) {
            /** @var object $value */
            $value = get_class($value);
        }

        $this->message = sprintf($message, $value);
    }
}
