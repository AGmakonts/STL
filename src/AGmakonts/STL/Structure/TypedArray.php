<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-11-01
 * Time: 01:03
 */

namespace AGmakonts\STL\Structure;

use AGmakonts\STL\Number\Integer;
use AGmakonts\STL\Structure\Exception\InvalidElementContainerException;
use AGmakonts\STL\Structure\Exception\InvalidElementException;
use AGmakonts\STL\Structure\Exception\OffsetToLargeException;

class TypedArray implements \Iterator, \ArrayAccess, \Countable
{
    /**
     * @var \SplFixedArray
     */
    private $elements;

    /**
     * @var \AGmakonts\STL\Structure\Type
     */
    private $type;

    /**
     * @var \AGmakonts\STL\Number\Integer
     */
    private $size;

    /**
     * @param \AGmakonts\STL\Structure\Type $type
     * @param \AGmakonts\STL\Number\Integer $size
     * @param null|array|\Iterator $elements
     *
     * @throws \AGmakonts\STL\Structure\Exception\OffsetToLargeException
     */
    public function __construct(Type $type, Integer $size, $elements = NULL)
    {
        $this->type = $type;
        $this->size = $size;

        if(NULL === $elements) {
            $this->elements = new \SplFixedArray($size->value());
        } else {
            $this->elements = $this->processElements($elements);
        }


    }

    private function processElements($elements)
    {

        $requestedElements = NULL;


        if(FALSE === is_array($elements) || FALSE === ($elements instanceof \Iterator)) {

            throw new InvalidElementContainerException();
        }


        if(TRUE === is_array($elements) || TRUE === ($elements instanceof \Countable)) {

            $requestedElements = count($elements);
        }

        if(NULL !== $requestedElements && $requestedElements > $this->size->value()) {

            throw new OffsetToLargeException($this->size->value(), $requestedElements);
        }

        foreach ($elements as $element) {

            $this->processSingleElement($element);

        }

    }

    public function processSingleElement($element)
    {
        if(FALSE === $this->type->isTypeOf($element)) {
            throw new InvalidElementException();
        }




    }


    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     *
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        // TODO: Implement current() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     *
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        // TODO: Implement next() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     *
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        // TODO: Implement key() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     *
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     *       Returns true on success or false on failure.
     */
    public function valid()
    {
        // TODO: Implement valid() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Whether a offset exists
     *
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset <p>
     *                      An offset to check for.
     *                      </p>
     *
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to retrieve
     *
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset <p>
     *                      The offset to retrieve.
     *                      </p>
     *
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to set
     *
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset <p>
     *                      The offset to assign the value to.
     *                      </p>
     * @param mixed $value  <p>
     *                      The value to set.
     *                      </p>
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to unset
     *
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     *                      The offset to unset.
     *                      </p>
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}