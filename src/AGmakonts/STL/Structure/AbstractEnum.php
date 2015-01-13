<?php
/**
 * Created by IntelliJ IDEA.
 * User: Radek Adamiec<radek@procreative.eu>
 * Date: 13.01.15
 * Time: 16:22
 */

namespace AGmakonts\STL\Structure;

use AGmakonts\STL\AbstractValueObject;
use AGmakonts\STL\ValueObjectInterface;
use MabeEnum\Enum;

abstract class AbstractEnum extends Enum implements ValueObjectInterface
{

    /**
     * @return string
     */
    public function value()
    {
        return (string)$this->getValue();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getValue();
    }

    /**
     * @return string
     */
    public function extractedValue()
    {
        return AbstractValueObject::extractValue([$this->getValue()]);
    }
}