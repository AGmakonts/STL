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
     * @return string
     */
    public function value()
    {
        return (string)(new \DateTime())->setTimestamp($this->getTimestamp()->value())->format(self::DATETIME_FORMAT);
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
        return $date->getTimestamp()->isLessThan($this->getTimestamp());
        
    }

    /**
     * @param \AGmakonts\STL\DateTime\DateTime $date
     *
     * @return boolean
     */
    public function isFurtherThan(DateTime $date)
    {
        return $date->getTimestamp()->isGreaterThan($this->getTimestamp());
        
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
        return self::getInstanceForValue($timestamp);
    }
}