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
use AGmakonts\STL\String\String;
use STL\DateTime\Exception\InvalidDateTimeValueException;

class DateTime extends AbstractValueObject
{

    const DATETIME_FORMAT = \DateTime::ISO8601;

    /**
     * @var \AGmakonts\STL\Number\Integer
     */
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
     * @param string $format
     *
     * @return string
     */
    public function value($format = self::DATETIME_FORMAT)
    {
        return (string)(new \DateTime())->setTimestamp($this->getTimestamp()->value())->format($format);
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
     * @param \AGmakonts\STL\DateTime\DateTime $date
     * 
     * @return boolean
     */
    public function isEarlierThan(DateTime $date)
    {
        return $date->getTimestamp()->isGreaterThan($this->getTimestamp());
        
    }

    /**
     * @param \AGmakonts\STL\DateTime\DateTime $date
     *
     * @return boolean
     */
    public function isFurtherThan(DateTime $date)
    {
        return $date->getTimestamp()->isLessThan($this->getTimestamp());
        
    }

    /**
     * @return boolean
     */
    public function isToday()
    {
        $nativeDateTime = new \DateTime();
        $nativeDateTime->setTimestamp($this->getTimestamp()->value());
        
        $nativeDateTime->setTime(0,0,0);
        
        $todayNativeDateTime = new \DateTime();
        $todayNativeDateTime->setTime(0,0,0);
        
        return $nativeDateTime->getTimestamp() === $todayNativeDateTime->getTimestamp();
    }


    /**
     * @return \AGmakonts\STL\Number\Integer
     */
    public function getTimestamp()
    {
       return $this->timestamp; 
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
        $timestamp = (NULL === $timestamp) ? Integer::get((new \DateTime())->getTimestamp()) : $timestamp;
        
        return self::getInstanceForValue($timestamp);
    }

    /**
     * @param \AGmakonts\STL\String\String $date
     * @param \AGmakonts\STL\String\String $format
     *
     * @return DateTime
     */
    public static function getFromFormat(String $date, String $format)
    {
        $dateTime = \DateTime::createFromFormat($format->value(), $date->value());

        if(FALSE === $dateTime)
        {
            throw new \InvalidArgumentException("Wrong format or date provided");

        }

        $timestamp = Integer::get($dateTime->getTimestamp());
        return self::getInstanceForValue($timestamp);
    }


}