<?php
namespace AGmakonts\STL\Number;

use AGmakonts\STL\Number\Exception\InvalidValueException;
use AGmakonts\STL\Number\NumberInterface;
/**
 *
 * @author adamgrabek
 *
 */
class Natural extends Integer
{
    /* (non-PHPdoc)
     * @see \AGmakonts\STL\Number\Real::__construct()
     */
    public function __construct($number)
    {

        $value = filter_var($number, FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);

        if (FALSE === $value) {

            throw new InvalidValueException($number, ['INT (>= 0)']);
        }

        parent::__construct($value);

    }


    /* (non-PHPdoc)
     * @see \AGmakonts\STL\Number\Integer::createFrom()
     */
    public static function createFrom(NumberInterface $number)
    {

        if(TRUE === $number->assertIsNegative()) {

            $number = new Natural(0);

        }

        $roundValue = $number->round();

        return new static($roundValue->value());

    }


}
