<?php

namespace AGmakonts\STL\String;

use AGmakonts\STL\AbstractValueObject;
use AGmakonts\STL\Number\Integer;
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

        if(FALSE === is_string($value) && FALSE === ($value instanceof StringInterface) && NULL !== $value) {
            throw new InvalidStringValueException($value);
        }

        if($value instanceof StringInterface) {
            $value = $value->value();
        }

        $this->value = $value;

        if(NULL === $value || TRUE === ctype_space($value)) {
            $this->isEmpty = TRUE;
            $this->value = '';
        }


    }

    /**
     * @param string $string
     *
     * @return \AGmakonts\STL\String\String
     */
    static public function get($string = '')
    {
        return self::getInstanceForValue($string);
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
     * @param \AGmakonts\STL\Number\Integer $length
     * @param null|StringInterface          $ellipsis
     *
     * @return \AGmakonts\STL\String\String
     */
    public function truncate(Integer $length, StringInterface $ellipsis = NULL)
    {
        /**
         * Create empty ellipsis for unified length calculations
         */
        if(NULL === $ellipsis) {
            $ellipsis = self::get();
        }

        /**
         * If desired length is greater than string itself do nothing
         */
        if(TRUE === $length->isGreaterOrEqualTo($this->length())) {
            return $this;
        }

        /**
         * Subtract elispis length from desired length
         * to know where to start chopping string
         */
        /** @var StringInterface $ellipsis */
        $finalLength = $length->subtract($ellipsis->length());

        for($i = $finalLength->value(); $i >= 0; $i--) {

            $testedCharacter = $this->charAtPosition(Integer::get($i));

            if(TRUE === $testedCharacter->isEmpty()) {
                return $this->substr(Integer::get(), Integer::get($i - 1))
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
     * @return \AGmakonts\STL\Number\Integer
     */
    public function length()
    {
        return Integer::get(strlen($this->value()));

    }

    /**
     *
     *
     * @see \AGmakonts\STL\String\StringInterface::concat()
     *
     * @param StringInterface      $string
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
     * @param \AGmakonts\STL\Number\Integer      $start
     * @param null|\AGmakonts\STL\Number\Integer $length
     *
     * @return \AGmakonts\STL\String\String
     */
    public function substr(Integer $start, Integer $length = NULL)
    {
        if(NULL !== $length) {
            $lengthPlain = $length->value();
        } else {
            $lengthPlain = NULL;
        }

        return self::get(substr($this->value(), $start->value(), $lengthPlain));
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
     * @param \AGmakonts\STL\Number\Integer  $position
     *
     * @return \AGmakonts\STL\String\String
     */
    public function charAtPosition(Integer $position)
    {
        $one = Integer::get(1);

        return $this->substr($position->subtract($one), $one);

    }

    /**
     * @param \AGmakonts\STL\Number\Integer         $length
     * @param \AGmakonts\STL\String\Padding         $mode
     * @param \AGmakonts\STL\String\StringInterface $fill
     * @return \AGmakonts\STL\String\String
     */
    public function padded(Integer $length, Padding $mode = NULL, StringInterface $fill)
    {

    }

    public function converted()
    {
        // TODO: Implement converted() method.
    }


}