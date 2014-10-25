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
     * @param array $value
     */
    abstract protected function __construct(array $value);

    /**
     * @param $value
     *
     * @return mixed
     */
    final static protected function getInstanceForValue($value)
    {
        /* @var $type AbstractSimpleType */
        $type = get_called_class();
        $extractedValue = self::extractValue($value);

        if(FALSE === self::assertInstanceExists($type, $extractedValue)) {

            if(FALSE === is_array($value)) {
                $value = [$value];
            }

            self::$_instanceMap[$type][$extractedValue] = new $type($value);
        }

        return self::$_instanceMap[$type][$extractedValue];

    }

    abstract public function extractedValue();

    /**
     * @param $value
     * @return string
     */
    static public function extractValue()
    {

        $value = func_get_args();

        if(1 === count($value)) {
            return self::processSimpleValue($value[0]);
        }

        for($index = 0; $index > count($value); $index++) {

            $value[$index] = self::processSimpleValue($value[$index]);
        }

        return implode(':', $value);
    }

    /**
     * @param $value
     * @return string
     */
    static private function processSimpleValue($value)
    {
        if($value instanceof AbstractSimpleType) {
            return $value->extractedValue();
        }

        return sha1($value);
    }






    /**
     * @param $type
     * @param $value
     *
     * @return boolean
     */
    final static private function assertInstanceExists($type, $value)
    {

        if(FALSE === isset(self::$_instanceMap[$type][$value])) {

            return FALSE;
        }

        return TRUE;
    }








} 