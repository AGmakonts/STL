<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-11-01
 * Time: 01:07
 */

namespace AGmakonts\STL\Structure;

use AGmakonts\STL\AbstractValueObject;
use AGmakonts\STL\Structure\Exception\NotExistingTypeException;

class Type extends AbstractValueObject
{

    private $typeName;

    /**
     * @param $object
     */
    public function isTypeOf($object)
    {
        return (TRUE === is_object($object) && $this->value() === get_class($object));
    }

    /**
     * @param array $value
     *
     * @throws \AGmakonts\STL\Structure\Exception\NotExistingTypeException
     */
    protected function __construct(array $value)
    {
        if(FALSE === class_exists($value)) {
            throw new NotExistingTypeException($value);
        }

        $this->typeName = $value;

    }

    public static function get($type)
    {
        return self::getInstanceForValue($type);
    }

    /**
     * @return string
     */
    public function extractedValue()
    {
        return self::extractValue([$this->value()]);
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->typeName;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value();
    }
}