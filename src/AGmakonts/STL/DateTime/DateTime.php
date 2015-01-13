<?php
/**
 * Created by IntelliJ IDEA.
 * User: Radek Adamiec<radek@procreative.eu>
 * Date: 13.01.15
 * Time: 17:57
 */

namespace AGmakonts\STL\DateTime;


use AGmakonts\STL\AbstractValueObject;
use AGmakonts\STL\Number\Integer;
use STL\DateTime\Exception\InvalidDateTimeValueException;

class DateTime extends AbstractValueObject
{

    const DATETIME_FORMAT = \DateTime::ISO8601;
    private $timestamp;

    /**
     * @param array $value
     *
     */
    protected function __construct(array $value)
    {
        $value = $value[0];

        if (NULL === $value) {
            $value = Integer::get(time());
        }

        $this->timestamp = $value;
    }

    /**
     * @return string
     */
    public function value()
    {
        return (string) (new \DateTime())->setTimestamp($this->timestamp->value())->format(self::DATETIME_FORMAT);
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
        return AbstractValueObject::extractValue([$this->value()]);
    }


    /**
     * Creates instance of DateTime from timestamp
     *
     * @param \AGmakonts\STL\Number\Integer $timestamp
     *
     * @return DateTime
     */
    public static function get(Integer $timestamp = NULL)
    {
        return self::getInstanceForValue($timestamp);
    }
}