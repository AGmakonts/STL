<?php
namespace AGmakonts\STL\Number;

use AGmakonts\STL\Number\Exception\InvalidValueException;
/**
 *
 * @author adamgrabek
 *
 */
class Integer extends Real
{
    /* (non-PHPdoc)
     * @see \AGmakonts\STL\Number\Real::__construct()
     */
    public function __construct($number) {

        $value = filter_var($number, FILTER_VALIDATE_INT);

        if (FALSE === $value) {

            throw new InvalidValueException($number, ['INT']);
        }

        parent::__construct($value);

    }
}
