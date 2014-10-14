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

    abstract static protected function create();
    abstract static public function get();






} 