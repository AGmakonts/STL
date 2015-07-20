<?php
/**
 * Created by PhpStorm.
 * User: miszka
 * Date: 20.07.15
 * Time: 13:20
 */

namespace AGmakonts\STL\Structure;


use AGmakonts\STL\AbstractValueObject;
use AGmakonts\STL\Structure\Exception\InvalidJsonException;


class Json extends AbstractValueObject
{
    /**
     * @var
     */
    private $value;

    /**
     * @param $json
     * @return mixed
     */
    static public function get($json)
    {
        return self::getInstanceForValue($json);
    }

    /**
     * @param array $value
     * @throws InvalidJsonException
     */
    protected function __construct(array $value)
    {
       $value = $value[0];
        if (false === $this->isJsonValid($value)){
            throw new InvalidJsonException;
        }
        $this-> value = $value;
    }

    /**
     * @param $json
     * @return bool
     */
    private function isJsonValid($json){

        return (Null !== json_decode($json));

    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value();
    }

    /**
     * @return string
     */
    public function extractedValue()
    {
        return self::extractValue([$this->value()]);
    }


}