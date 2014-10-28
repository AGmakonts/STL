<?php

namespace AGmakonts\STL\String;

use AGmakonts\STL\AbstractValueObject;
use AGmakonts\STL\Number\Integer;
use AGmakonts\STL\Number\Natural;
use AGmakonts\STL\String\Exception\InvalidStringValueException;

/**
 *
 * @author Adam
 *
 */
class String extends AbstractValueObject implements StringInterface
{

    private $value;

    private $isEmpty = FALSE;

    protected function __construct(array $value)
    {
        $value = $value[0];

        if (FALSE === is_string($value) && FALSE === ($value instanceof StringInterface) && NULL !== $value) {
            throw new InvalidStringValueException($value);
        }

        if ($value instanceof StringInterface) {
            $value = $value->value();
        }

        $this->value = $value;

        if (NULL === $value || TRUE === ctype_space($value)) {
            $this->isEmpty = TRUE;
            $this->value   = '';
        }

    }

    /**
     * @return \AGmakonts\STL\String\String
     */
    static public function get()
    {
        $params = func_get_args();

        $paramsCount = count($params);

        if (1 < $paramsCount) {
            throw new \InvalidArgumentException('String value can be composed of only one element');
        } elseif (0 === $paramsCount) {
            $params[0] = '';
        }



        return self::getInstanceForValue($params[0]);
    }

    public function extractedValue()
    {
        return parent::extractValue($this->value());
    }


    /**
     * @return \AGmakonts\STL\String\String
     */
    public function uppercase()
    {

        return static::get(strtoupper($this->value()));

    }

    /**
     * @return \AGmakonts\STL\String\String
     */
    public function lowercase()
    {
        return static::get(strtolower($this->value()));
    }

    /**
     * @return \AGmakonts\STL\String\String
     */
    public function reverse()
    {
        return static::get(strrev($this->value()));
    }


    /**
     * @param Natural              $length
     * @param null|StringInterface $ellipsis
     * @return \AGmakonts\STL\String\String
     */
    public function truncate(Natural $length, StringInterface $ellipsis = NULL)
    {
        /**
         * Create empty ellipsis for unified length calculations
         */
        if (NULL === $ellipsis) {
            $ellipsis = self::get();
        }

        /**
         * If desired length is greater than string itself do nothing
         */
        if (TRUE === $length->assertIsGreaterOrEqualTo($this->length())) {
            return $this;
        }

        /**
         * Subtract elispis length from desired length
         * to know where to start chopping string
         */
        $finalLength = $length->subtract($ellipsis->length());

        for ($i = $finalLength->value(); $i >= 0; $i--) {

            $testedCharacter = $this->charAtPosition(new Natural($i));

            if (TRUE === $testedCharacter->isEmpty()) {
                return $this->substr(new Integer(0), new Integer($i - 1))
                            ->concat($ellipsis);
            }

            unset($testedCharacter);

        }

        return static::get();

    }

    /**
     *
     *
     * @see \AGmakonts\STL\String\StringInterface::assertIsEqualTo()
     *
     * @param StringInterface $string
     *
     * @return bool
     */
    public function equalTo(StringInterface $string)
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
     *
     *
     * @see \AGmakonts\STL\String\StringInterface::concat()
     *
     * @param StringInterface $string
     * @param null|StringInterface $glue
     *
     * @return \AGmakonts\STL\String\String
     */
    public function concat(StringInterface $string, StringInterface $glue = NULL)
    {
        if(NULL === $glue) {
            $glue = self::get();
        }

        return self::get($this->value() . $glue->value() . $string->value());
    }

    /**
     *
     *
     * @see \AGmakonts\STL\String\StringInterface::substr()
     *
     * @param \AGmakonts\STL\Number\Integer $start
     * @param null|\AGmakonts\STL\Number\Integer $length
     *
     * @return \AGmakonts\STL\String\String
     */
    public function substr(Integer $start, Integer $length = NULL)
    {
        if (NULL !== $length) {
            $length = $length->value();
        }

        return self::get(substr($this->value(), $start->value(), $length));
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return $this->isEmpty;
    }

    /**
     * @return string
     */
    public function value()
    {
        return $this->value;

    }

    /**
     * @return string
     */
    public function _toString()
    {

        return $this->value();

    }

    /**
     * @param Natural $position
     *
     * @return String
     */
    public function charAtPosition(Natural $position)
    {
        $one = new Natural(1);

        return $this->substr($position->subtract($one), $one);

    }
}