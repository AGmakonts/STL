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
    abstract protected function __construct();

    /**
     * @param $value
     *
     * @return mixed
     */
    final static protected function getInstanceForValue(...$value)
    {
        /* @var $type AbstractSimpleType */
        $type = get_called_class();



        if(FALSE === self::assertInstanceExists($type, $value)) {
            self::$_instanceMap[$type][$value] = new $type($value);
        }

        return self::$_instanceMap[$type][$value];

    }

    static private function extractValue(...$value)
    {
        foreach($value as $valuePart) {

            if($valuePart instanceof AbstractSimpleType) {

            }
        }
    }

    static public function get(...$params)
    {
        return self::getInstanceForValue($params);
    }



    /**
     * @param $type
     * @param $value
     *
     * @return boolean
     */
    final static private function assertInstanceExists($type, $value)
    {


        if(FALSE === array_key_exists(self::$_instanceMap[$type], $value)) {

            return FALSE;
        }

        return TRUE;
    }








} 