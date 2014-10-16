<?php
/**
 * Created by PhpStorm.
 * User: adamgrabek
 * Date: 14/10/14
 * Time: 23:28
 */

namespace AGmakonts\STL;


abstract class AbstractSimpleType implements SimpleTypeInterface
{

    private static $_instanceMap = [];

    /**
     *
     */
    final private function __construct()
    {

    }

    /**
     * @param $value
     *
     * @return mixed
     */
    final static protected function getInstanceForValue($value)
    {
        /* @var $type AbstractSimpleType */
        $type = get_called_class();

        if(FALSE === self::assertInstanceExists($type, $value)) {
            self::$_instanceMap[$type][$value] = $type::create($value);
        }

        return self::$_instanceMap[$type][$value];

    }

    /**
     * @param $value
     *
     * @return boolean
     */
    final static private function assertInstanceExists($type, $value)
    {


        if(FALSE === array_key_exists(self::$_instanceMap, $type)) {

            return FALSE;
        }

        if(FALSE === array_key_exists(self::$_instanceMap[$type], $value)) {

            return FALSE;
        }

        return TRUE;
    }

    /**
     * @param \AGmakonts\STL\AbstractSimpleType $object
     *
     * @return string
     */
    final protected function extractValue(AbstractSimpleType $object)
    {
        $properties = get_object_vars($this);

        $valueParts = [];

        for($index = 0; $index < count($properties); $index++) {

            $valueParts[] = $this->extractSingleValuePart($properties[$index]);
        }

        return implode(':', $valueParts);

    }

    /**
     * @param $property
     *
     * @return string
     */
    final protected function extractSingleValuePart($property)
    {
        return $property instanceof AbstractSimpleType ? $this->getInstanceForValue($property) : strval($property);

    }

    abstract static protected function create();
    abstract static public function get();






} 