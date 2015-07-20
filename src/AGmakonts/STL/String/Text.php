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
class Text extends AbstractValueObject implements StringInterface
{
    /**
     * @var string
     */
    private $value;

    /**
     * @var bool
     */
    private $isEmpty = FALSE;

    /**
     * @var \AGmakonts\STL\Number\Integer
     */
    private $length;

    protected function __construct(array $value)
    {

        $value = $value[0];

        if(FALSE === is_string($value) && FALSE === ($value instanceof StringInterface) && NULL !== $value) {
            throw new InvalidStringValueException($value);
        }

        if($value instanceof StringInterface) {
            $value = $value->value();
        }

        if(NULL === $value || TRUE === ctype_space($value) || $value === '') {
            $this->isEmpty = TRUE;
            $this->value   = '';
        } else {
            $this->value = $value;
        }

        $this->length = Integer::get(strlen($this->value()));


    }

    /**
     * @param string $string
     *
     * @return \AGmakonts\STL\String\Text
     */
    static public function get($string = NULL)
    {
        return self::getInstanceForValue($string);
    }

    public function extractedValue()
    {
        return parent::extractValue([$this->value()]);

    }


    /**
     * @return \AGmakonts\STL\String\Text
     */
    public function uppercase()
    {

        return static::get(strtoupper($this->value()));

    }

    /**
     * @return \AGmakonts\STL\String\Text
     */
    public function lowercase()
    {
        return static::get(strtolower($this->value()));
    }

    /**
     * @return \AGmakonts\STL\String\Text
     */
    public function reverse()
    {
        return static::get(strrev($this->value()));
    }


    /**
     * @param \AGmakonts\STL\Number\Integer $length
     * @param null|StringInterface          $ellipsis
     *
     * @return \AGmakonts\STL\String\Text
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

            $testedCharacter = $this->charAtPosition(Integer::get($i + 1));

            if(TRUE === $testedCharacter->isEmpty()) {
                return $this->substr(Integer::get(), Integer::get($i))
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
        return $this->length;

    }

    /**
     *
     *
     * @see \AGmakonts\STL\String\StringInterface::concat()
     *
     * @param StringInterface      $string
     * @param null|StringInterface $glue
     *
     * @return \AGmakonts\STL\String\Text
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
     * @return \AGmakonts\STL\String\Text
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
    public function __toString()
    {

        return $this->value();

    }

    /**
     * @param \AGmakonts\STL\Number\Integer  $position
     *
     * @return \AGmakonts\STL\String\Text
     */
    public function charAtPosition(Integer $position)
    {
        $one = Integer::get(1);

        return $this->substr($position->subtract($one), $one);

    }

    /**
     * @param \AGmakonts\STL\Number\Integer              $length
     * @param null|\AGmakonts\STL\String\Padding         $mode
     * @param null|\AGmakonts\STL\String\StringInterface $fill
     *
     * @return \AGmakonts\STL\String\Text
     */
    public function padded(Integer $length, Padding $mode = NULL, StringInterface $fill = NULL)
    {
        if(NULL !== $fill) {
            $fill = $fill->value();
        }

        if(NULL !== $mode) {
            $mode = $mode->getValue();
        }

        return self::get(str_pad($this->value,$length->value(),$fill, $mode));
    }
}