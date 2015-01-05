<?php
/**
 * Created by PhpStorm.
 * User: adamgrabek
 * Date: 14/10/14
 * Time: 23:28
 */

namespace AGmakonts\STL;


abstract class AbstractValueObject implements ValueObjectInterface
{

    /**
     * @var array Container for all instances of Simple Types.
     *            Instances are stored in a two-dimensional
     *            array with following structure:
     *            [
     *                  [TYPE CLASS NAME] => [
     *                                              VALUE => INSTANCE
     *                                       ]
     *            ]
     */
    private static $instanceMap = [];

    /**
     * @param array $value
     *
     */
    abstract protected function __construct(array $value);

    /**
     * @param $value
     *
     * @return mixed
     */
    final static protected function getInstanceForValue($value)
    {

        if(FALSE === is_array($value)) {
            $value = [$value];
        }

        /* @var $type AbstractValueObject */
        $type           = get_called_class();
        $extractedValue = self::extractValue($value);

        if(FALSE === self::assertInstanceExists($type, $extractedValue)) {

            /** @var string $type */
            self::$instanceMap[$type][$extractedValue] = new $type($value);
        }

        return self::$instanceMap[$type][$extractedValue];

    }



    /**
     * @param $value
     * @return string
     */
    static public function extractValue(array $value)
    {
        if(1 === count($value)) {

            return self::processSimpleValue($value[0]);
        }

        $maxIndex = count($value);

        for($index = 0; $index < $maxIndex; $index++) {

            $value[$index] = self::extractValue([$value[$index]]);
        }

        return implode(':', $value);


    }

    /**
     * @param $value
     * @return string
     */
    static private function processSimpleValue($value)
    {


        if(TRUE === is_array($value) && 1 === count($value)) {
            $value = $value[0];
        }

        if(TRUE === is_array($value) && TRUE === empty($value)) {
            $value = NULL;
        }

        if(NULL === $value) {
            $value = 'NULL';
        }


        if($value instanceof AbstractValueObject || $value instanceof ValueObjectInterface) {
            return $value->extractedValue();
        } elseif (TRUE === is_object($value)) {
            throw new \InvalidArgumentException('Value needs to be plain PHP type or AbstractValueObject');
        }

        return sha1(strval($value));
    }


    /**
     * @param $type
     * @param string $value
     *
     * @return boolean
     */
    final static private function assertInstanceExists($type, $value)
    {
        return  isset(self::$instanceMap[$type][$value]);
    }
}