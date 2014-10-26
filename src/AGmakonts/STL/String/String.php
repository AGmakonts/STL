<?php

namespace AGmakonts\STL\String;

use AGmakonts\STL\AbstractSimpleType;
use AGmakonts\STL\Number\Natural;
use AGmakonts\STL\String\Exception\InvalidStringValueException;
use AGmakonts\STL\Number\Integer;

/**
 *
 * @author Adam
 *
 */
class String extends AbstractSimpleType implements StringInterface
{

    private $value;

    private $isEmpty = FALSE;

    protected function __construct(array $value)
    {
        $value = $value[0];

        if(FALSE === is_string($value) && FALSE === ($value instanceof StringInterface) && NULL !== $value) {
            throw new InvalidStringValueException($value);
        }

        if($value instanceof StringInterface) {
            $value = $value->value();
        }

        $this->value = $value;

        if(NULL === $value || TRUE === ctype_space($value)) {
            $this->isEmpty = TRUE;
            $this->value   = '';
        }

    }

    static public function get()
    {
        $params = func_get_args();

        if(1 !== count($params)) {
            throw new \InvalidArgumentException('String value can be composed of only one element');
        }

        return self::getInstanceForValue($params[0]);
    }

    public function extractedValue()
    {
        return parent::extractValue($this->value());
    }


    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\String\StringInterface::uppercase()
     *
     */
    public function uppercase()
    {

        return static::get(strtoupper($this->value()));

    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\String\StringInterface::lowercase()
     *
     */
    public function lowercase()
    {
        return static::get(strtolower($this->value()));
    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\String\StringInterface::reverse()
     *
     */
    public function reverse()
    {
        return static::get(strrev($this->value()));
    }


    /**
     * @param Natural         $length
     * @param StringInterface $ellipsis
     * @return StringInterface
     */
    public function truncate(Natural $length, StringInterface $ellipsis = NULL)
    {
        /**
         * Create empty ellipsis for unified length calculations
         */
        if(NULL === $ellipsis) {
            $ellipsis = String::get();
        }

        /**
         * If desired length is greater than string itself do nothing
         */
        if(TRUE === $length->assertIsGreaterOrEqualTo($this->length())) {
            return $this;
        }

        /**
         * Subtract elispis length from desired length
         * to know where to start chopping string
         */
        $finalLength = $length->subtract($ellipsis->length());

        for ($i = $finalLength->value(); $i >= 0; $i--) {

            $testedCharacter = $this->charAtPosition(new Natural($i));

            if(TRUE === $testedCharacter->assertIsEmpty()) {
                return $this->substr(new Integer(0), new Integer($i-1))->concat($ellipsis);
            }

            unset($testedCharacter);

        }

        return static::get();

    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\String\StringInterface::assertIsEqualTo()
     *
     */
    public function assertIsEqualTo(StringInterface $string)
    {
        return ($this->value() === $string->value());
    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\String\StringInterface::length()
     *
     */
    public function length()
    {
        return new Natural(strlen($this->value()));

    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\String\StringInterface::concat()
     *
     */
    public function concat(StringInterface $string)
    {
        return static::get($this->value() . $string->value());
    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\String\StringInterface::substr()
     *
     */
    public function substr(Integer $start, Integer $length = NULL)
    {
        if(NULL !== $length) {
            $length = $length->value();
        }

        return static::get(substr($this->value(), $start->value(), $length));
    }

    public function assertIsEmpty()
    {
        return $this->isEmpty;
    }

    /* (non-PHPdoc)
     * @see \AGmakonts\STL\String\StringInterface::value()
     */
    public function value ()
    {
        return $this->value;

    }
    /* (non-PHPdoc)
     * @see \AGmakonts\STL\SimpleTypeInterface::__toString()
     */
    public function _toString() {

        return $this->value();

    }

    /* (non-PHPdoc)
     * @see \AGmakonts\STL\String\StringInterface::getCharAtPosition()
     */
    public function charAtPosition(Natural $position)
    {
        $one = new Natural(1);

        return $this->substr($position->subtract($one), $one);

    }






}

