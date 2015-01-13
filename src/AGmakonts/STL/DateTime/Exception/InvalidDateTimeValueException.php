<?php
/**
 * Created by IntelliJ IDEA.
 * User: Radek Adamiec<radek@procreative.eu>
 * Date: 13.01.15
 * Time: 18:22
 */

namespace STL\DateTime\Exception;


use Doctrine\Instantiator\Exception\InvalidArgumentException;

class InvalidDateTimeValueException extends InvalidArgumentException{

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $message = "Value '%s' is not valid";

        if(TRUE === is_object($value)) {
            /** @var object $value */
            $value = get_class($value);
        }

        $this->message = sprintf($message, $value);
    }
}