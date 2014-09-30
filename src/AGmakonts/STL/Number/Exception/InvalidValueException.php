<?php
namespace AGmakonts\STL\Number\Exception;

/**
 *
 * @author adamgrabek
 *
 */
class InvalidValueException extends \InvalidArgumentException
{


	/* (non-PHPdoc)
     * @see InvalidArgumentException::__construct()
     */
    public function __construct ($value, array $allowedTypes)
    {
        $message = "Value '%s' has invalid type. Allowed types are %s";

        $allowedTypesJoined = implode(', ', $allowedTypes);


        $this->message = sprintf($message, $value, $allowedTypes);

    }


}

?>