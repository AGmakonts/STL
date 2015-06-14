<?php
/**
 * Created by PhpStorm.
 * User: adamgrabek
 * Date: 15/06/15
 * Time: 00:27
 */

namespace AGmakonts\STL\Structure;


use AGmakonts\STL\AbstractValueObject;
use AGmakonts\STL\ValueObjectInterface;

/**
 * Class KeyValuePair
 *
 * @package AGmakonts\STL\Structure
 */
class KeyValuePair extends AbstractValueObject
{
    /**
     * @var \AGmakonts\STL\ValueObjectInterface
     */
    private $key;

    /**
     * @var \AGmakonts\STL\ValueObjectInterface
     */
    private $value;

    /**
     * @param \AGmakonts\STL\ValueObjectInterface $key
     * @param \AGmakonts\STL\ValueObjectInterface $value
     *
     * @return KeyValuePair
     */
    static public function get(ValueObjectInterface $key, ValueObjectInterface $value)
    {
        return self::getInstanceForValue([$key, $value]);
    }

    /**
     * @param array $value
     *
     */
    protected function __construct(array $value)
    {
        /** @var \AGmakonts\STL\ValueObjectInterface $key */
        /** @var \AGmakonts\STL\ValueObjectInterface $value */
        list($key, $value) = $value;

        $this->value = $value;
        $this->key   = $key;
    }

    /**
     * @return \AGmakonts\STL\Structure\KeyValuePair
     */
    public function swapped()
    {
        return self::get($this->pairValue(), $this->key());
    }

    /**
     * @return \AGmakonts\STL\ValueObjectInterface
     */
    public function pairValue()
    {
        return $this->value;
    }

    /**
     * @return \AGmakonts\STL\ValueObjectInterface
     */
    public function key()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->value->value();
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
        return self::extractValue([$this->key, $this->value]);
    }

}