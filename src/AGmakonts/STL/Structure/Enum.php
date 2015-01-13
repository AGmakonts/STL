<?php
/**
 * Created by IntelliJ IDEA.
 * User: Radek Adamiec<radek@adamiec.it>
 * Date: 13.01.15
 * Time: 16:22
 */

namespace AGmakonts\STL\Structure;


use AGmakonts\STL\AbstractValueObject;
use AGmakonts\STL\ValueObjectInterface;

abstract class Enum extends \MabeEnum\Enum implements ValueObjectInterface
{

    /**
     * @return string
     */
    public function value()
    {
        return (string) $this->getValue();
    }

    /**
     * @return string
     */
    public function extractedValue()
    {
        return AbstractValueObject::extractValue([$this->getValue()]);
    }


}