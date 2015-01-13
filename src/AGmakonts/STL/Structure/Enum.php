<?php
/**
 * Created by IntelliJ IDEA.
 * User: radek
 * Date: 13.01.15
 * Time: 16:22
 */

namespace AGmakonts\STL\Structure;


use AGmakonts\STL\AbstractValueObject;
use AGmakonts\STL\ValueObjectInterface;

abstract class Enum extends \MabeEnum\Enum implements ValueObjectInterface
{

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->getValue();
    }

    /**
     * @return string
     */
    public function extractedValue()
    {
        return AbstractValueObject::extractValue([$this->getValue()]);
    }


}